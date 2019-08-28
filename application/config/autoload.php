<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();


$autoload['libraries'] = array('form_validation','session','pagination', 'CI_Minifier');


$autoload['drivers'] = array();


$autoload['helper'] = array('url', 'form','text','file');

$autoload['config'] = array();

$autoload['language'] = array();


$autoload['model'] = array('User_model','Page_model','Member_model','Posts_model','Comment_model', 'Admin_model', 'ViewCounter_model', 'UserActivity');
