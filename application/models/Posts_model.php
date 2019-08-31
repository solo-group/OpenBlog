<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
	class Posts_model extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}

    	public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('posts.post_id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('post_slug' => $slug));
			return $query->row_array();
		}
		public function getPostByCat($limit = FALSE, $post_cat){
			if($limit){
				$this->db->limit($limit);
			}
			$query = $this->db->get_where('posts', array('post_cat' => $post_cat));
			return $query->result_array();
		}

		public function getPostByTag($limit = FALSE, $post_tag){
			if($limit){
				$this->db->limit($limit);
			}
			$this->db->like('post_tags',$post_tag);
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		public function getPostByAuthor($limit = FALSE, $authName){
			
			$query = $this->db->get_where('posts', array('post_author' => $authName));
			return $query->result_array();
		}

		public function search($limit, $search=''){
		    
		    if($limit){
				$this->db->limit($limit);
			}
		    $this->db->like('post_title',$search);
		    $this->db->or_like('post_author',$search);
		    $this->db->or_like('post_content',$search);
		    $this->db->or_like('post_tags',$search);
		    $this->db->or_like('post_cat',$search);
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		public function getPostauthor($post_author){
			$this->db->select('fullName, userImg');
			$query = $this->db->get_where('users', array('userName' => $post_author));
			return $query->row_array();
		}



		//get comments for the post 
		public function getComments($slug){

			$sql="SELECT com_id, com_for, com_who, com_content, com_on, fullName, userImg FROM comments JOIN users ON username = comments.com_who WHERE com_for='$slug'";
			$query = $this->db->query($sql);

			return $query->result_array();
		}

		//get loged user detail 
		public function getLogU($username){
			$this->db->select('userName, fullName, userImg');
			$query = $this->db->get_where('users', array('userName' => $username));
			return $query->row_array();
		}

		//Previous post
		public function previousPost($id){
			$query= "SELECT * FROM posts WHERE post_id < $id ORDER BY post_id DESC LIMIT 1";
			$result= $this->db->query($query);
			return $result->row_array();
		}

		//Next post
		public function nextPost($id){
			$query= "SELECT * FROM posts WHERE post_id > $id ORDER BY post_id  LIMIT 1";
			$result= $this->db->query($query);
			return $result->row_array();
		}

		//relative posts

		public function relatedPosts($title1='', $title2=''){
			$query="SELECT * FROM posts WHERE post_title LIKE '%$title1%' OR post_title LIKE '%$title2%' OR post_tags  LIKE '%$title1%' OR post_tags  LIKE '%$title2%'  ORDER BY post_id DESC LIMIT 3";
			$result= $this->db->query($query);
			return $result->result_array();
		}

		

	}