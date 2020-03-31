<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_model 
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('bcrypt'); 
	}

	public function admin_login($user_email,$user_password)
	{
		 $data = $this->db->get_where('users', array('email' => $user_email))->result();
		/*echo "<pre/>"; print_r($data);die();*/
		 if($data)
		 {

		 	$check = $this->bcrypt->check_password($user_password, $data[0]->password);
		 	/*echo $check;die();*/
			if($check)
			{
				
				return $data;
			}
		 }
		 else
		 {
		 	return $data;
		 }
	}

	public function validate_pass($user_id, $new_password, $old_password)
	{
		$data = $this->db->get_where('users', array('ID' => $user_id))->result();
		$check = $this->bcrypt->check_password($old_password, $data[0]->password);
		/*print_r($new_password); die();*/
		if($check)
		{
			$this->db->where('ID', $user_id);
    		$this->db->update('users', $new_password);
    		return "Password Change Successfully";
		}
		else
		{
			return "Enter Correct Old Password";
		}
	}
			
}
?>
