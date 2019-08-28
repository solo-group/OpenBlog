<?php
/**
 * @name        OpenBlog - An Open Socurce Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}

		// register user
		public function register($enc_password){
			// User data array
			$data = array(
				'userName' =>$this->security->xss_clean($this->input->post('username')) ,
				'passWord' => $enc_password,
				'fullName' => $this->security->xss_clean($this->input->post('fullName')),
				'email' => $this->security->xss_clean($this->input->post('email')),
				'userPosition' => $this->getPosition(),
			);
			// Insert user
			return $this->db->insert('users', $data);
		}

		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->select('user_id, userName, userPosition, userImg');
			$this->db->where('userName',$username);
			$this->db->where('passWord', $password);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->row_array(0);
			} else {
				return false;
			}
		}
		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('userName' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Get the position
		public function getPosition(){
			$query = $this->db->get_where('users', array('userPosition' => 'admin'));
			if(empty($query->row_array())){
				return 'admin';
			} else {
				return 'member';
			}
		}
	}
