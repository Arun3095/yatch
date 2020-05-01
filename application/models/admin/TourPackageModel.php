<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TourPackageModel extends CI_model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function insert_tourpackage($TourPackage_data)
	{
			$this->db->insert('tour_packages' , $TourPackage_data);
			return "Added Successfully  ";
	}

	public function get_all_view()
	{	
			   /*$this->db->order_by("ID", "desc");*/
		return $this->db->get('tour_packages')->result();
		/*return $this->db->get_where('tour_packages', array('status' => '1' ))->result();*/
	}

	public function get_tourpackage_detail($id)
	{
		return $this->db->get_where('tour_packages', array('ID' => $id))->result();
		
	}

	public function update_tourpackage($edit_tourpackage_info , $id)
	{
		$this->db->where('ID' , $id)->update('tour_packages' , $edit_tourpackage_info);
		return "Record Updated Successfully ";
	}

	/*Get All Golf Record Only*/
	public function golf_tour(){
		return $this->db->get_where('tour_packages', array('status' => '1' , 'category_id' => '1' ))->result();
	}
	/*End Here*/

		/*Delete User*/
	public function delete($id)
	{
		$this->db->where('ID' , $id)->delete('tour_packages');
		return "Record Deleted Successfully ";
	}

	/*Status Update*/
	public function update_status($id ,$data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('tour_packages');
	}
	/*End Here*/

}