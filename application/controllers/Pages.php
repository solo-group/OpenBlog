<?php
/**
 * @name        OpenBlog - An Open Socurce Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT MIT License
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
  public function view($page="home"){
      
    if ( ! file_exists(APPPATH.'views/pages/'.strtolower($page).'.php')){
              show_404();
       }
       if ($page=='home') {
         $data['pageTitle']= $this->Page_model->getsiteDetails()['site_tagline'];    
       }else {
         $data['pageTitle']= ucwords($page);
       }
       $this->viewCount();
       $data['popularPosts']= $this->Page_model->getPopularPosts();
       $data['latestPosts']= $this->Page_model->getLatestposts();
       $data['latestPostsSide']= $this->Page_model->getLatestposts(4);
       $data['categories']= $this->Page_model->getCategories();
       $data['categoriesTP']= $this->Page_model->getCategoriesTP($data['categories']);
       $data['socialIcons']= $this->Page_model->getsocialIcons();

       $data['commentsS']=$this->Comment_model->getComments(5);

       

       //page meta
       $this->load->helper('url');
       $data['pageMeta']= array(
        'pageUrl' => current_url(), 
        'pageThumbnail'=>$this->Page_model->getsiteDetails()['site_logo'],
        'siteLogo'=>$this->Page_model->getsiteDetails()['site_logo'],
        'favIcon'=> $this->Page_model->getsiteDetails()['site_favicon'],
        'siteName'=> $this->Page_model->getsiteDetails()['site_name'],
        'pageDes'=>$this->Page_model->getsiteDetails()['site_des'],
        'siteDes'=>$this->Page_model->getsiteDetails()['site_des']

       );


       $this->load->view('templates/header', $data);
       $this->load->view('pages/'.strtolower($page), $data);
       $this->load->view('templates/sidebar', $data);
       $this->load->view('templates/footer', $data);
  }




  //view counter 
  public function viewCount(){
    // load cookie helper
    $this->load->helper('cookie');
    
    $check_visitor = $this->input->cookie($this->Page_model->getsiteDetails()['site_name'], FALSE);
    
    $ip = $this->input->ip_address();
    $date= date("Y-m-d");

    if ($check_visitor == false) {
        $cookie = array(
            "name"   => $this->Page_model->getsiteDetails()['site_name'],
            "value"  => $ip,
            "expire" =>  time() + 86400*30,
            "secure" => false
        );
        $this->input->set_cookie($cookie);
        $this->ViewCounter_model->update_counter($date);
    }else{
        $this->ViewCounter_model->addPageview($date);
    }
  }


}
