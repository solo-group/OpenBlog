<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT MIT License
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function create($postSlug){

        $this->load->library('user_agent');
        
        //redirect to the post
        if ($this->Comment_model->create_comment($postSlug)) {
        	//update comment for the post 

        	$this->Comment_model->updateComC($postSlug);
            $this->UserActivity->addActivity($this->session->userdata('username'), 'comment added successfully..');
            $this->session->set_flashdata('comment_added', 'comment added successfully..');
        }
        redirect( $this->agent->referrer());

        
    }


}
