<?php
/**
 * @name        OpenBlog - An Open Socurce Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
	class Comment_model extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}
		public function create_comment($postSlug){
			$data = array(
				'com_for' => $postSlug,
				'com_who' => $this->session->userdata('username'),
				'com_content' => $this->security->xss_clean($this->input->post('com_content'))
			);


			return $this->db->insert('comments', $data);
		}

		public function updateComC($slug){
			$data = array(
				'post_comment' => $this->getComC($slug)['post_comment']+1 );
			$this->db->where('post_slug', $slug);
			

			return $this->db->update('posts', $data);
		}
		public function getComC($slug){
			$query = $this->db->get_where('posts', array('post_slug' => $slug));
			return $query->row_array();
		}

		public function getComments($limit = FALSE){
			if ($limit) {
				$sql= "SELECT com_id, com_for, com_who, com_content, com_on, fullName, userImg FROM comments join users ON comments.com_who=users.userName ORDER BY com_id DESC LIMIT $limit";
			}else{
				$sql= "SELECT com_id, com_for, com_who, com_content, com_on, fullName, userImg FROM comments join users ON comments.com_who=users.userName ORDER BY com_id DESC ";
			}
			
			$query = $this->db->query($sql);
			return $query->result_array();
		}

	}