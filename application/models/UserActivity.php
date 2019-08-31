<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
	class UserActivity extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}

		public function addActivity($for, $message){
			$data= array(
				'acc_for' => $for, 
				'acc_message' => $message, 

			);

			if ($this->db->insert('user_activity', $data)) {
				return true;
			}


		}

		public function getActivity($username= ''){
			if ($username=='') {
				$username=$this->session->userdata('username');
			}
			$this->db->order_by('act_id', 'DESC');
			$this->db->limit(15);
			$query = $this->db->get_where('user_activity', array('acc_for' => $username));
			return $query->result_array();
		}

		



	}
