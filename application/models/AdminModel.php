<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_model 
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('bcrypt'); 
	}

	/*Add User*/
	public function insert($user_data)
	{
			$this->db->insert('users' , $user_data);
			return "User Added Successfully";
	}
	
	public function get_admin_detail($id)
	{
		return $this->db->get_where('users', array('ID' => $id))->result();
		/*echo "<pre/>"; print_r($admin);die();*/
	}

	public function get_all_user()
	{
		return $this->db->get('users')->result();
	}

	public function update_admin($admin_data,$admin_id)
	{
		 $this->db->where('ID',$admin_id)->update('users',$admin_data);
		/*echo "<pre/>";print_r($admin);die();*/
	}

	/*Status Update*/
	public function update_status($id ,$data)
	{
		 $this->db->set($data);
         $this->db->where('ID', $id);
         $this->db->update('users');
	}
	/*End Here*/

	/*Delete User*/
	public function delete_user($id)
	{
		$this->db->where('ID' , $id)->delete('users');
	}

			
}
?>
