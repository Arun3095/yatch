<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestimonialModel extends CI_model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_testimonial($testimonial_data)
	{
			$this->db->insert('testimonials' , $testimonial_data);
			return "Added Successfully  ";
	}

	public function get_all_view()
	{
		return $this->db->get('testimonials')->result();
	}

	public function get_testimonial_detail($id)
	{
		return $this->db->get_where('testimonials', array('ID' => $id))->result();
		/*echo "<pre/>"; print_r($admin);die();*/
	}

	public function update_testimonial($edit_testimonial_info , $id)
	{
		$ad = $this->db->where('ID' , $id)->update('testimonials' , $edit_testimonial_info);
	}

	/*Delete User*/
	public function delete($id)
	{
		$this->db->where('ID' , $id)->delete('testimonials');
	}


	/*Status Update*/
	public function update_status($id ,$data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('testimonials');
	}
	/*End Here*/


}