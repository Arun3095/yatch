<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_model 
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('bcrypt'); 
	}
			
}
?>
