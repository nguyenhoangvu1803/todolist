<?php 

class PostsTest extends PHPUnit_Framework_TestCase
{
	/** @test */
	public function returns_array_posts()
	{
		require 'models/post.php';
		$post = new Post([
			['id'=>1,'word_name'=>'PHP','starting_date'=>'2019-11-06','ending_date'=>'2019-11-09','status'=>1],
			['id'=>2,'word_name'=>'PHPUNIT','starting_date'=>'2019-11-06','ending_date'=>'2019-11-09','status'=>2]
		]);
		
		$this->assertEquals([['id'=>1,'word_name'=>'PHP','starting_date'=>'2019-11-06','ending_date'=>'2019-11-09','status'=>1],['id'=>2,'word_name'=>'PHPUNIT','starting_date'=>'2019-11-06','ending_date'=>'2019-11-09','status'=>2]], $post);
	}
}

