<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
	class Page_model extends CI_Model{
    public function __construct(){
			$this->load->database();
		}

	public function getLatestposts($limit= 5){

		$this->db->order_by('posts.post_id', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get('posts');
		return $query->result_array();

	}

	public function getPopularPosts($limit=4){
		$this->db->order_by('posts.post_view', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get('posts');
		return $query->result_array();
	}

	public function getCategories(){
		$this->db->select('cat_name');
		$this->db->order_by('cat_po', 'ASC');
		$query = $this->db->get('Categories');
		return $query->result_array();
	}

	public function getCategoriesTP($Categories){

		$catTP[]='';
		foreach ($Categories as $Category) {
			$this->db->select('post_cat');
			$query = $this->db->get_where('posts', array('post_cat' => $Category['cat_name']));
			$catTP[$Category['cat_name']]=$query->num_rows();
		}
		return $catTP;
		
	}
	
	public function getsocialIcons(){
		$query = $this->db->get('social_links');
		return $query->result_array();
	}

	public function getsiteDetails(){
		$query = $this->db->get('sitedetails');
		return $query->row_array(0);
	
	}


}
