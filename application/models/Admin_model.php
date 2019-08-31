<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin_model extends CI_Model{

    	public function __construct(){

			$this->load->database();

		}



		public function getCategories(){

			$this->db->select('cat_name, cat_id, cat_on, cat_po');

			$this->db->order_by('cat_po', 'ASC');

			$query = $this->db->get('Categories');

			return $query->result_array();

		}

		public function getCategory($id){

			$this->db->select('cat_name, cat_id, cat_on, cat_po');

			$query = $this->db->get_where('Categories', array('cat_id' => $id));

			return $query->row_array(0);

		}



		public function createPost($post_image){

			$xslug = url_title($this->input->post('postTitle'));
			$Pslug =  preg_replace('/[^a-zA-Z0-9-]/', '', $xslug);
			 if ($Pslug == '' || strlen($Pslug) <= 10) {
			 	$slug= $Pslug.crc32(microtime());
			 }else{
			 	$slug= $Pslug;
			 }
			$data = array(

				'post_title' => $this->security->xss_clean($this->input->post('postTitle')),

				'post_slug' => $slug,

				'post_content' => $this->input->post('postContent'),

				'post_cat' => $this->input->post('category'),

				'post_tags' => $this->input->post('tags'),

				'post_status' => 'approved',

				'post_author' => $this->session->userdata('username'),

				'post_thumb' => $post_image

			);

			return $this->db->insert('posts', $data);

		}



		public function updatePost($slug){

			$data = array(

				'post_title' => $this->security->xss_clean($this->input->post('postTitle')),

				'post_content' => $this->input->post('postContent'),

				'post_cat' => $this->input->post('category'),

				'post_tags' => $this->input->post('tags')

			);

			$this->db->where('post_slug', $slug);

			return $this->db->update('posts', $data);

		}



		public function deletePost($slug){

			

			$this->db->where('post_slug', $slug);

			return $this->db->delete('posts');

		}



		

		public function editpost($slug){

			$query = $this->db->get_where('posts', array('post_slug' => $slug));

			return $query->row_array(0);

		}



		public function addcat(){

			$data = array(

				'cat_name' => $this->security->xss_clean($this->input->post('catName')),

				'cat_po' => $this->security->xss_clean($this->input->post('catPosition')),

				'cat_who' => $this->session->userdata['username']

			);

			return $this->db->insert('Categories', $data);

		}



		public function updateCat($id){

			$data = array(

				'cat_name' => $this->security->xss_clean($this->input->post('catName')),

				'cat_po' => $this->security->xss_clean($this->input->post('catPosition'))

			);

			$this->db->where('cat_id', $id);

			return $this->db->update('Categories', $data);

		}



		public function deleteCat($id){

			$this->db->where('cat_id', $id);

			return $this->db->delete('Categories');

		}



		public function postCount(){

			$this->db->select('post_id');

			$query = $this->db->get('posts');

			return $query->num_rows();

		}



		public function comCount(){

			$this->db->select('com_id');

			$query = $this->db->get('comments');

			return $query->num_rows();

		}



		public function getAllComments($limit= FALSE){

			if ($limit) {

				$sql= "SELECT com_id, com_for, com_who, com_content, com_on, fullName, userImg FROM comments join users ON comments.com_who=users.userName ORDER BY com_id DESC LIMIT $limit";

			}else{

				$sql= "SELECT com_id, com_for, com_who, com_content, com_on, fullName, userImg FROM comments join users ON comments.com_who=users.userName ORDER BY com_id DESC ";

			}

			

			$query = $this->db->query($sql);

			return $query->result_array();

		}



		public function delCom($id){

			$this->db->where('com_id', $id);

			if ($this->db->delete('comments')) {

				return true;

			}

			

		}



		public function uDelete($id){

			$this->db->where('user_id', $id);

			if ($this->db->delete('users')) {

				return true;

			}

		}



		public function getAllUsers(){

			$sql="SELECT user_id, userImg,email, fullName, resOn, userPosition FROM users WHERE userPosition NOT IN ('admin') ORDER BY user_id DESC";

			$query = $this->db->query($sql);

			return $query->result_array();

		}



		public function getUser($id){

			$this->db->select('user_id, userName, userImg, fullName, email, userPosition, resOn, birthDate, gender');

			$this->db->where('user_id', $id);

			$query= $this->db->get('users');

			return $query->row_array();





		}





		public function getSocialIcon($id){

			$query = $this->db->get_where('social_links', array('link_id' => $id));

			return $query->row_array(0);

		}

		public function addSLink(){

			$data = array(

				'link_name' => $this->security->xss_clean($this->input->post('SocialName')),

				'link_icon' => $this->security->xss_clean($this->input->post('socialIcon')),

				'url' => $this->security->xss_clean($this->input->post('socialLink'))

			);

			return $this->db->insert('social_links', $data);

		}



		public function updateSlink($id){

			$data = array(

				'link_name' => $this->security->xss_clean($this->input->post('SocialName')),

				'link_icon' => $this->security->xss_clean($this->input->post('socialIcon')),

				'url' => $this->security->xss_clean($this->input->post('socialLink'))

			);

			$this->db->where('link_id', $id);

			return $this->db->update('social_links', $data);

		}



		public function deleteSIcon($id){

			$this->db->where('link_id', $id);

			return $this->db->delete('social_links');

		}



		public function updateSD($id){

			$data = array(

				'site_name' => $this->security->xss_clean($this->input->post('siteTitle')),

				'site_tagline' => $this->security->xss_clean($this->input->post('siteTagline')),

				'site_des' => $this->security->xss_clean($this->input->post('siteDes'))

			);

			$this->db->where('d_id', $id);

			return $this->db->update('sitedetails', $data);

		}



		public function updateLogo($id, $img){

			$data = array(

				'site_logo' => $img

			);

			$this->db->where('d_id', $id);

			return $this->db->update('sitedetails', $data);

		}



		public function updateFav($id, $img){

			$data = array(

				'site_favicon' => $img

			);

			$this->db->where('d_id', $id);

			return $this->db->update('sitedetails', $data);

		}



	}

