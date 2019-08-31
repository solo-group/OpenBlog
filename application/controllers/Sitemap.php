<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    
	public function index(){
		$data['posts']= $this->Page_model->getLatestposts();
		$data['categories']= $this->Page_model->getCategories();
		$this->load->view('sitemap', $data);
	}


}
