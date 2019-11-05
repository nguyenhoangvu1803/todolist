<?php 
	$id = '';
	$work_name = '';
	$starting_date = '';
	$ending_date = '';
	$status = '';
	if(isset($post)){
		$id = $post->id;
		$work_name = $post->work_name;
		$starting_date = $post->starting_date;
		$ending_date = $post->ending_date;
		$status = $post->status;
	}
?>
<form action="index.php?controller=posts&action=savePost" method="POST" id="form_add_work">
	<input type="hidden" name="id" value="<?php echo $id;?>"/>
	Work name:
	<br>
	<input type="text" name="work_name" placeholder="Work name" value="<?php echo $work_name;?>"/>
	<br>
	Starting Date:
	<br>
	<input type="text" name="starting_date" id="from_date" placeholder="Starting Date" value="<?php echo $starting_date;?>"/>
	<br>
	Ending Date:
	<br>
	<input type="text" name="ending_date" id="to_date" placeholder="Ending Date" value="<?php echo $ending_date;?>"/>
	<br>
	Status:
	<br>
	<select name="status">
		<option value="1" <?php if ($status == 1 ) echo 'selected' ; ?>>Planning</option>
		<option value="2" <?php if ($status == 2 ) echo 'selected' ; ?>>Doing</option>
		<option value="3" <?php if ($status == 3 ) echo 'selected' ; ?>>Complete</option>
	</select>
	<br>
	<br>
	<input type="submit" value="Submit" />
</form> 
