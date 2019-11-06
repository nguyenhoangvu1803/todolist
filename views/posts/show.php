<div class='py-5 text-center'>
	<h2>View a work</h2>
	<?php
		echo "Work: $post->work_name";
		echo "<br/>";
		echo "Starting Date: $post->starting_date";
		echo "<br/>";
		echo "Ending Date: $post->ending_date";
		echo "<br/>";
		echo "Status: ";
		if($post->status == 1) 
			echo 'Planning'; 
		elseif($post->status == 2) 
			echo 'Doing'; 
		else 
			echo 'Complete';  
		echo "<br/>";
		echo '<a href="index.php?controller=posts">Back to list</a>'
	?>
</div>