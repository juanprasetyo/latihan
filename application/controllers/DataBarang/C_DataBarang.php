<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_DataBarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load Model
        $this->load->model('M_Login');
        $this->load->model('M_Barang');

        // Load Library
        $this->load->library('session');
        $this->load->library('form_validation');
        
        is_logged_in();
        
    }
    public function index()
    {
        $data = [
            'title' => 'List Barang',
            'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
            'barang' => $this->M_Barang->get_all_barang()->result_array()
        ];
        
        $barang = [
            'nama_barang' =>  $this->input->post('nama_barang'),
            'jumlah_barang' =>  $this->input->post('jumlah_barang')
        ];
        $this->form_validation->set_rules('nama_barang[]', 'Nama_Barang', 'required');
        $this->form_validation->set_rules('jumlah_barang[]', 'Jumlah_Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/V_Header', $data);
            $this->load->view('layouts/V_Sidebar', $data);
            $this->load->view('DataBarang/V_ListBarang', $data);
            $this->load->view('layouts/V_Footer');
        } else {
            $this->M_Barang->add_data_barang($barang);
            redirect(base_url('DataBarang/listBarang'));
        }
    }

    public function get_barang()
    {
        $data = json_encode($this->M_Barang->get_all_barang()->result());
        echo $data;
    }
    
    public function edit_barang()
    {
        $id = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');

        $this->M_Barang->update_barang($id, $nama_barang, $jumlah_barang);
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode('Berhasil di Update'));
    }

    public function delete_barang()
    {
        $id = $this->input->post('id');
        $this->M_Barang->delete_barang($id);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode("Data Barang berhasil dihapus!"));
    }

    public function cariBarang()
    {
        $keyword = $this->input->get('search');
        $data = $this->M_Barang->search_data($keyword)->result_array();
        $a = [];
        foreach ($data as $key => $val) {
           $showData = [
               'id' => $val['id_barang'],
               'text' => $val['nama_barang']
           ];
           array_push($a, $showData); 
        }
        echo json_encode($a);
    }

    public function viewCariBarang()
    {
        $data = [
            'title' => 'List Barang',
            'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array()
        ];

        $this->load->view('layouts/V_Header', $data);
        $this->load->view('layouts/V_Sidebar', $data);
        $this->load->view('DataBarang/V_CariBarang', $data);
        $this->load->view('layouts/V_Footer');
    }

    public function show_selected_barang()
    {
        $id = $this->input->get('id_barang');
        $data = $this->M_Barang->get_data_byid($id)->row_array();
        
        echo json_encode($data);
    }

    public function exportExcel()
    {
        $this->load->library('PHPExcel');

        $data = $this->M_Barang->get_all_barang()->result_array();

        $php_excel = new PHPExcel();

        $php_excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $php_excel->getActiveSheet()->getColumnDimension('c')->setAutoSize(true);

        $active_sheet = $php_excel->getActiveSheet();
        $active_sheet
            ->setCellValue('B2', 'No')
            ->setCellValue('C2', 'Nama Barang')
            ->setCellValue('D2', 'Jumlah barang');

        foreach($data as $key => $barang){
            $row = $key + 3;
            $active_sheet
                ->setCellValue("B{$row}", $key+1)
                ->setCellValue("C{$row}", $barang['nama_barang'])
                ->setCellValue("D{$row}", $barang['jumlah']);
        }

        $excel_writer = PHPExcel_IOFactory::createWriter($php_excel, 'Excel2007');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Content-Type: application/vnd.openxmlformat-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Barang.xlsx"');
        $excel_writer->save('php://output');
    }

    public function uploadDataByExcel()
    {
        $this->load->library('PHPExcel');
        // $tempBarangDir = glob('./assets/upload/TempUploadExcelBarang/*');
        // foreach($tempBarangDir as $key => $val){
        //     if(is_file($val)){
        //         unlink($val);
        //     }
        // }
        $file = $_FILES['file_excel']['name'];
        echo "<pre>";
        print_r($file);
        // die;
        $ext = explode('.', $file)[1];
        print_r($ext);
        $config['upload_path']      = './assets/upload/TempUploadExcelBarang';
        $config['allowed_types']    = 'xlsx|xls';

        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('file_excel')){
            $errror = ['error' => $this->upload->display_errors()];
            echo json_encode($errror);
            exit;
        } else {
            $media = $this->upload->data();
            $file_name = './assets/upload/TempUploadExcelBarang/'. $media['file_name'];

            try {
                $inputFile      = PHPExcel_IOFactory::identify($file_name);
                $ObjReader      = PHPExcel_IOFactory::createReader($inputFile);
                $ObjPHPExcel    = $ObjReader->load($file_name);
            } catch (Exception $e) {
                die('Error loading file: '.pathinfo($file_name, PATHINFO_BASENAME) . ":" . $e->getMessage);
            }
            
            $sheet		  	= $ObjPHPExcel->getSheet(0);
			$highestRow	 	= $sheet->getHighestRow();

			// if ((count($array_id)+1) != ($highestRow)) {
			// 	echo json_encode('Err');
			// 	exit;
            // }
            $arrayDataBarang = [];
            
            $row = 3;
            while($sheet->getCell('B'.$row)->getValue() !== null){
                $dataBarang = [
                    'nama_barang'    => $sheet->getCell('B'.$row)->getValue(),
                    'jumlah_barang'  => $sheet->getCell('C'.$row)->getValue()
                ];

                array_push($arrayDataBarang, $dataBarang);
                $row++;
            }
            echo "<pre>";
            print_r($arrayDataBarang);
            die;

            // echo $this->load->view('CatalogMonitoring/ContractProcess/Shipment/V_ShipmentActualTable', $data, TRUE);
       }
    }
}