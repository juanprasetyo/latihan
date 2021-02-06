 <?php
Defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_Latihan extends CI_Model
{
	var $table = "users";
	var $select_column = ['id', 'name', 'email', 'address'];
	var $order_column = ['id', 'name', 'email', 'address', null];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		// $this->db2 = $this->load->database('db2', true);
		$this->mirror = $this->load->database('mirroring', true);
	}

	// Query Server Side Datatables
	public function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);

		if(isset($_POST["search"]["value"])){
			$this->db->like('name', $_POST["search"]["value"]);
			$this->db->or_like('email', $_POST["search"]["value"]);
			$this->db->or_like('address', $_POST["search"]["value"]);
		}

		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST["order"][0]["column"]], $_POST["order"][0]["dir"]);
		} else {
			$this->db->order_by('id', 'DESC');
		}
	}

	public function make_datatables()
	{
		$this->make_query();

		if(isset($_POST["length"])){
			$this->db->limit($_POST["length"], $_POST["start"]);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data()
	{
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	// End Query Server Side Datatables

	public function get_user_by_id($id)
	{
		return $this->db->get_where('users', ['id' => $id])->row_array();
	}

	public function save_new_user($data)
	{
		$this->db->insert('users', $data);
	}

	public function delete_data($id)
	{
		$this->db->delete('users', ['id' => $id]);
	}

	public function update_edit_data($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	// Mirroring data
	public function get_admin_byId($id){
		return $this->mirror->query("
			SELECT * FROM admin_buyer WHERE id_admin = '$id'
		")->row_array();
	}

	public function get_koor_byId($id){
		return $this->mirror->query("
			SELECT * FROM koor_buyer WHERE id_koor = '$id'
		")->row_array();
	}

	public function get_all_admin(){
		return $this->mirror->query("SELECT * FROM admin_buyer");
	}

	public function get_all_koor(){
		return $this->mirror->query("SELECT * FROM koor_buyer");
	}

	public function save_user_mirroring($table, $data){
		$this->mirror->insert($table, $data);
		return $this->mirror->affected_rows();
	}

	public function update_user_mirroring($table, $data, $id){
		$this->mirror->update($table, $data, ['id' => $id]);
		return $this->mirror->affected_rows();
	}

	public function delete_user_admin($id){
		$this->mirror->delete('admin_buyer', ['id' => $id]);
		return $this->mirror->affected_rows();
	}

	public function delete_user_koor($id){
		$this->mirror->delete('koor_buyer', ['id' => $id]);
		return $this->mirror->affected_rows();
	}
}