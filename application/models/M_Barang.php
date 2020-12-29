<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Barang extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_barang()
    {
        return $this->db->get('barang');
    }

    public function add_data_barang($data)
    {
        $query = "INSERT INTO barang VALUES ('', ?, ?)";
        for ($i=0; $i < count($data['nama_barang']); $i++) { 
            $this->db->query($query, [$data['nama_barang'][$i], $data['jumlah_barang'][$i]]);
       }
    }

    public function get_data_byid($id)
    {
        return $this->db->get_where('barang', ['id_barang' => $id]);
    }

    public function update_barang($id, $nama, $jumlah)
    {
        $data = [
            'nama_barang' => $nama,
            'jumlah' => $jumlah
        ];
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }

    public function delete_barang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }

    public function search_data($keyword)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->like('nama_barang', $keyword);
        return $this->db->get();
    }
}