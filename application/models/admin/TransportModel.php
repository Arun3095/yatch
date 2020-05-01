<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransportModel extends CI_model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_transport($transport_data)
	{
			$this->db->insert('transports' , $transport_data);
			return "Added Successfully  ";
	}

	public function get_all_view()
	{
		return $this->db->get('transports')->result();
	}

	public function get_transport_detail($id)
	{
		return $this->db->get_where('transports', array('ID' => $id))->result();
		
	}

	public function update_transport($edit_transport_info , $id)
	{
		$this->db->where('ID' , $id)->update('transports' , $edit_transport_info);
		return "Record Updated Successfully ";
	}

		/*Delete User*/
	public function delete($id)
	{
		$this->db->where('ID' , $id)->delete('transports');
		return "Record Deleted Successfully ";
	}

	/*Status Update*/
	public function update_status($id ,$data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('transports');
	}
	/*End Here*/



}
?>