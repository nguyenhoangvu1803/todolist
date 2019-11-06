<?php 

class PostsTest extends PHPUnit_Framework_TestCase
{
	/** @test */
	public function returns_a_posts()
	{
		require 'models/post.php';
		
		$post = new Post(3,'PHP','2019-11-05','2019-11-06',1);
		
		$this->assertEquals([
			'id'=>3,
			'word_name'=>'PHP',
			'starting_date'=>'2019-11-05',
			'ending_date'=>'2019-11-06',
			'status'=>1
		], $post);
	}
}

