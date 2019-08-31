<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT	MIT License
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function profile($username = ''){
	  	if(!$this->session->userdata('logged_in')){
			redirect('Login');
		}
		if ($username=='') {
			$username= $this->session->userdata('username');
		}
		$data['categories']= $this->Admin_model->getCategories();
		$data['socialIcons']= $this->Page_model->getsocialIcons();
		$data['pageTitle']="Profile";
		$data['username']=$this->session->userdata('username');
		if (!$this->Member_model->getUserDetils($username)) {
			redirect('Logout');
		}
		$data['UserInfo']=$this->Member_model->getUserDetils($username);
		$data['activities']=$this->UserActivity->getActivity($this->session->userdata('username'));
		

		//page meta
       $this->load->helper('url');
       $data['pageMeta']= array(
        'pageUrl' => current_url(), 
        'pageThumbnail'=>$this->Page_model->getsiteDetails()['site_logo'],
        'siteLogo'=>$this->Page_model->getsiteDetails()['site_logo'],
        'favIcon'=> $this->Page_model->getsiteDetails()['site_favicon'],
        'siteName'=> $this->Page_model->getsiteDetails()['site_name'],
        'pageDes'=>$this->Page_model->getsiteDetails()['site_tagline']

       );
		$this->load->view('templates/userheader',$data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/userfooter');

  	}

  	public function edit($username=''){
  		if(!$this->session->userdata('logged_in')){
			redirect('Login');
		}
  		if ($username == $this->session->userdata('username')) {
  			$data['categories']= $this->Admin_model->getCategories();
  			$data['socialIcons']= $this->Page_model->getsocialIcons();
			$data['pageTitle']="Profile";
			$data['username']=$this->session->userdata('username');
			if (!$this->Member_model->getUserDetils($username)) {
				redirect('Logout');
			}
			$data['UserInfo']=$this->Member_model->getUserDetils($username);
			$data['recentPosts']=$this->Member_model->getRecentPost();

			//page meta
	       $this->load->helper('url');
	       $data['pageMeta']= array(
	        'pageUrl' => current_url(), 
	        'pageThumbnail'=>$this->Page_model->getsiteDetails()['site_logo'],
	        'siteLogo'=>$this->Page_model->getsiteDetails()['site_logo'],
	        'favIcon'=> $this->Page_model->getsiteDetails()['site_favicon'],
	        'siteName'=> $this->Page_model->getsiteDetails()['site_name'],
	        'pageDes'=>$this->Page_model->getsiteDetails()['site_tagline']

	       );

			
			$this->form_validation->set_rules('fullName', 'Full Name', 'trim|required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/userheader',$data);
				$this->load->view('user/editProfile', $data);
				$this->load->view('templates/userfooter');
			}else{
				if (empty($_FILES["profileImage"]["name"] )) {
					$post_image = 'noAvatar.jpg';
				}else{
					// Upload Image
					// Get filename.
					$temp = explode(".", $_FILES["profileImage"]["name"]);
					// Get extension.
					$imageType = strtolower(end($temp));
					$profileImage = sha1(microtime()) . "." . $imageType;

					$config['upload_path'] = './images/temp';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config['max_size'] = '5000';
					$config['max_width'] = '4000';
					$config['max_height'] = '4000';
					$config['file_name'] =$profileImage;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('profileImage')){
						$errors = array('error' => $this->upload->display_errors());
						$post_image = 'noAvatar.jpg';

					} else {
						$data = array('upload_data' => $this->upload->data());
						$post_image = $profileImage;
						//thumbnail resizeing

		        		//90x65
		        		$this->doResize($post_image,'90', '65', 'profile');
					}
				}

				$this->Member_model->update($post_image);
				$this->UserActivity->addActivity($this->session->userdata('username'), 'profile has been updated');
				// Set message
				$this->session->set_flashdata('profileUpdated', 'Your profile has been updated');
				redirect('member');
			}
			

  		}elseif ($username=='') {
  			redirect('member/profile/'.$this->session->userdata('username'));
  		}
  	}

  	public function deleteComment($id){
  		$this->load->library('user_agent');
  		//check comment author
  		if ($this->Member_model->getComAuth($id)) {
  			$this->Member_model->updateComC($this->Member_model->getComAuth($id)['com_for']);
  			$this->Member_model->deleteCom($id);
  			$this->UserActivity->addActivity($this->session->userdata('username'), 'You just delete a comment..!!');
  			$this->session->set_flashdata('comDeleted', 'Your comment has been deleted.. !! ');
				redirect( $this->agent->referrer());
  		}else{
  			$this->session->set_flashdata('worng', 'something wrong in this system.. !! ');
				redirect('Home');
  		}
  	}


  	// Check if email exists
    public function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists', 'That email is taken. Please set a different one');
      if($this->User_model->check_email_exists($email)){
        return true;
      } else {
        return false;
      }
    }

    //thumbnail crop
    public function doResize($filename, $width, $height, $path){
        $destination_thumbs="./images/".$path."/";
        $upload_path="./images/temp/";
        $this->load->library('image_moo') ;
        $this->image_moo
        ->load($upload_path.$filename)
        ->resize_crop($width,$height)
        ->save($destination_thumbs.$filename);
      }



}
