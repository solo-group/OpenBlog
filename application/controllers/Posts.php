<?php
/**
 * @name        OpenBlog - An Open Source Blog Application
 * @author      Anik Ghosh
 * @link        https://github.com/anikghosh356/OpenBlog
 * @license     https://opensource.org/licenses/MIT MIT License
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {


 	public function index($offset = 0){	
		// Pagination Config	

		$config = [
            'base_url'   =>   base_url() . 'posts/index/',
            'per_page'   =>   5,
            'total_rows' =>   $this->db->count_all('posts'),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => '</ul>',
            'first_tag_open' =>'<li>',
            'first_tag_close' => '</li>',
            'last_tag_open' =>'<li>',
            'last_tag_close' => '</li>',
            'last_link'     =>  'Last',
            'next_tag_open' =>'<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' =>'<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' =>'<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_close' => '</a></li>',
            'attributes' =>array('class' => 'waves-effect')
		];

        $data['pageTitle']= 'Recent Posts';

        //sidebar and footer data
        $data['latestPosts']= $this->Page_model->getLatestposts();
        $data['latestPostsSide']= $this->Page_model->getLatestposts(4);

        $data['popularPosts']= $this->Page_model->getPopularPosts();
        $data['categories']= $this->Page_model->getCategories();
        $data['categoriesTP']= $this->Page_model->getCategoriesTP($data['categories']);
        $data['socialIcons']= $this->Page_model->getsocialIcons();
        $data['commentsS']=$this->Comment_model->getComments(5);

        //view count
        $this->viewCount();

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


		// Init Pagination
		$this->pagination->initialize($config);
		$data['posts'] = $this->Posts_model->get_posts(FALSE, $config['per_page'], $offset);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/posts', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
	public function view($slug = NULL){
        //view count
        $this->viewCount();

        

		$data['post'] = $this->Posts_model->get_posts($slug);
		$post_slug= $data['post']['post_slug'];
		$post_author= $data['post']['post_author'];
		$data['author']= $this->Posts_model->getPostauthor($post_author);
		$data['tags']= explode(",",$data['post']['post_tags']);
		$post_id = $data['post']['post_id'];
        if(empty($data['post']) || $data['post']==''){
                    show_404();
                }
        //post view update
        $this->postViewUp($slug);
		$data['previousPost']=$this->Posts_model->previousPost($post_id);
		$data['nextPost']=$this->Posts_model->nextPost($post_id);

        //comments
        $data['comments']= $this->Posts_model->getComments($post_slug);

		//sidebar and footer data
        $data['latestPosts']= $this->Page_model->getLatestposts();
        $data['latestPostsSide']= $this->Page_model->getLatestposts(4);

        $data['popularPosts']= $this->Page_model->getPopularPosts();
        $data['categories']= $this->Page_model->getCategories();
        $data['categoriesTP']= $this->Page_model->getCategoriesTP($data['categories']);
        $data['socialIcons']= $this->Page_model->getsocialIcons();
        $data['commentsS']=$this->Comment_model->getComments(5);

        if($this->session->userdata('logged_in')){
            $data['lUser']=$this->Posts_model->getLogU($this->session->userdata('username'));
        }


        if (!isset($data['tags'][1])) {
        	$title2='blog';
        }else{
        	$title2= $data['tags'][1];
        }
        $data['relatedPosts']=$this->Posts_model->relatedPosts($data['tags'][0],$title2);
		
		$data['pageTitle'] = $data['post']['post_title'];

        //page meta
       $this->load->helper('url');
       $data['pageMeta']= array(
        'pageUrl' => current_url(), 
        'pageThumbnail'=> '290x170/'.$this->Posts_model->get_posts($slug)['post_thumb'],
        'siteLogo'=>$this->Page_model->getsiteDetails()['site_logo'],
        'favIcon'=> $this->Page_model->getsiteDetails()['site_favicon'],
        'siteName'=> $this->Page_model->getsiteDetails()['site_name'],
        'pageDes'=> strip_tags($this->Posts_model->get_posts($slug)['post_content']),
        'siteDes'=>$this->Page_model->getsiteDetails()['site_des']

       );



		$this->load->view('templates/header', $data);
		$this->load->view('pages/single', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer', $data);
	}

    public function category($catName=''){
        //view count
        $this->viewCount();

        $data['pageTitle']= 'Posts on '.$catName;

        //sidebar and footer data
        $data['latestPosts']= $this->Page_model->getLatestposts();
        $data['latestPostsSide']= $this->Page_model->getLatestposts(4);

        $data['popularPosts']= $this->Page_model->getPopularPosts();
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
        'pageDes'=>$this->Page_model->getsiteDetails()['site_tagline'],
        'siteDes'=>$this->Page_model->getsiteDetails()['site_des']

       );


        $data['posts'] = $this->Posts_model->getPostByCat(10, $catName);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/posts', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tag($tagName=''){
        //view count
        $this->viewCount();

        $data['pageTitle']= 'Posts on '.$tagName;

        //sidebar and footer data
        $data['latestPosts']= $this->Page_model->getLatestposts();
        $data['latestPostsSide']= $this->Page_model->getLatestposts(4);

        $data['popularPosts']= $this->Page_model->getPopularPosts();
        $data['categories']= $this->Page_model->getCategories();
        $data['categoriesTP']= $this->Page_model->getCategoriesTP($data['categories']);
        $data['socialIcons']= $this->Page_model->getsocialIcons();
        $data['commentsS']=$this->Comment_model->getComments(5);

        $data['posts'] = $this->Posts_model->getPostByTag(10, $tagName);
        
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
        $this->load->view('pages/posts', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
    }

    public function author($author=''){
        //view count
        $this->viewCount();

        $data['author']= $this->Posts_model->getPostauthor($author);

        $data['pageTitle']= 'Posts of '.$data['author']['fullName'];

        //sidebar and footer data
        $data['latestPosts']= $this->Page_model->getLatestposts();
        $data['latestPostsSide']= $this->Page_model->getLatestposts(4);

        $data['popularPosts']= $this->Page_model->getPopularPosts();
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

        $data['posts'] = $this->Posts_model->getPostByAuthor(10, $author);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/posts', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
    }

    public function search(){
        //view count
        $this->viewCount();

        $data['pageTitle']= 'Posts for '.$this->input->post('searchText');

        //sidebar and footer data
        $data['latestPosts']= $this->Page_model->getLatestposts();
        $data['latestPostsSide']= $this->Page_model->getLatestposts(4);

        $data['popularPosts']= $this->Page_model->getPopularPosts();
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

        $data['posts'] = $this->Posts_model->search(10, $this->input->post('searchText'));
        $this->load->view('templates/header', $data);
        $this->load->view('pages/posts', $data);
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

    public function postViewUp($slug){
        
        $this->ViewCounter_model->upadtePostView($slug);

    }


}
