<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
	class Member_model extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}

		//get member info
		public function getUserDetils($username){
			$this->db->select('user_id,fullName,email, userName, userPosition, userImg, resOn, birthDate, gender');
			$this->db->where('userName',$username);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->row_array(0);
			} else {
				return false;
			}
		}

		//get recent post
		public function getRecentPost($limit= 3){

			$this->db->order_by('posts.post_id', 'DESC');
			if ($limit != false) {
				$this->db->limit($limit);
			}
			
			$query = $this->db->get('posts');
			return $query->result_array();

		}

		public function update($userImg){
			$data = array(
				'fullName' => $this->security->xss_clean($this->input->post('fullName')),
				'birthDate' => $this->security->xss_clean($this->input->post('birthDate')),
				'gender' => $this->security->xss_clean($this->input->post('gender')),
				'userImg' => $userImg
			);
			$this->db->where('userName', $this->session->userdata('username'));
			

			return $this->db->update('users', $data);
		}

		public function getComAuth($id){
			$sql = "SELECT com_for FROM comments WHERE com_id = ? AND com_who = ? ";
			$query= $this->db->query($sql, array($id, $this->session->userdata['username']));
			
			return $query->row_array();
		}

		public function getComAuthA($id){
			$sql = "SELECT com_for FROM comments WHERE com_id = $id  ";
			$query= $this->db->query($sql);
			
			return $query->row_array();
		}

		public function deleteCom($id){
			$this->db->where('com_id', $id);
			return $this->db->delete('comments');
		}
		

		public function updateComC($slug){

			$data = array(
				'post_comment' => $this->getComC($slug)['post_comment']-1 );
			$this->db->where('post_slug', $slug);
			

			return $this->db->update('posts', $data);
		}
		public function getComC($slug){
			$query = $this->db->get_where('posts', array('post_slug' => $slug));
			return $query->row_array();
		}



	}
