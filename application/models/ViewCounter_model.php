<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
 defined('BASEPATH') OR exit('No direct script access allowed');

	class viewCounter_model extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}

		public function update_counter($date){
			 
		    $this->db->where('date', $date);
		    $this->db->select('unique_visit, page_view');
		    $count = $this->db->get('views')->row();

		    if ($count) {
		    	$data = array(
				'unique_visit' => $count->unique_visit +1,
				'page_view' => $count->page_view +1
				);
				$this->db->where('date', $date);
				return $this->db->update('views', $data);
		    }else{
		    	$data = array(
				'unique_visit' => 1,
				'page_view' => 1,
				'date' => $date
				);
				return $this->db->insert('views', $data);
		    }
			
		    
		}

		public function addPageview($date){
			 
		    $this->db->where('date', $date);
		    $this->db->select('unique_visit, page_view');
		    $count = $this->db->get('views')->row();

		    if ($count) {
		    	$data = array(
				'page_view' => $count->page_view +1
				);
				$this->db->where('date', $date);
				return $this->db->update('views', $data);
		    }else{
		    	$data = array(
				'page_view' => 1,
				'date' => $date
				);
				return $this->db->insert('views', $data);
		    }
			
		    
		}
		
		public function upadtePostView($slug){
			 
		    $this->db->where('post_slug', $slug);
		    $this->db->select('post_view');
		    $count = $this->db->get('posts')->row();

	    	$data = array(
			'post_view' => $count->post_view +1
			);
			$this->db->where('post_slug', $slug);
			return $this->db->update('posts', $data);
		    
			
		    
		}

		public function getViews($limit){
			if ($limit) {
				$this->db->limit($limit);
				
			}
			
			$this->db->select('date, unique_visit, page_view');
			$query=$this->db->get('views');
			return $query->result_array();
		}

		public function allTimePageView(){
			
			
			$this->db->select('date, unique_visit, page_view');
			$query=$this->db->get('views');
			return $query->result_array();
		}



	}
