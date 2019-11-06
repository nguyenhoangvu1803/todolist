<?php

require_once('controllers/base_controller.php');
require_once('models/post.php');

class PostsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'posts';
	}

	public function index()
	{
		$notice = '';
		$find_form_date = '';
		$find_to_date = '';
		$searching_date = false;
		
		if(isset($_GET['id'])) {
			$post = Post::del($_GET['id']);
			$notice = 'Delete Success';
		}
		
		if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
			$find_form_date = $_GET['from_date'];
			$find_to_date = $_GET['to_date'];
			$searching_date = true;
		}
			
		$posts = Post::all($find_form_date,$find_to_date);
		$data = array(
		  'posts' => $posts,
		  'notice' => $notice,
		  'searching_date' => $searching_date
		);
		$this->render('index', $data);
	}
	
	public function showPost()
	{
		$post = Post::find($_GET['id']);
		$data = array('post' => $post);
		$this->render('show', $data);
	}
	
	public function addPost() 
	{
		if(isset($_GET['id'])) {
			$post = Post::find($_GET['id']);
			$data = array('post' => $post);
		} else {
			$data = array();
		}
		$this->render('add', $data);
	}
	
	public function savePost() 
	{
		$data = array();
		if(count($_POST)) {
			$post = Post::add($_POST);
			$data = array(
				'notice' => 'Save Success'
			);
		} 
		$this->render('save', $data);
	}
}


