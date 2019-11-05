<?php
	if(isset($notice)) echo $notice;
?>
<div><h2>FIND WORD</h2></div>
<form action="index.php" method="GET" id="form_find_word">
	<input type="hidden" name="controller" value="posts"/>
	From:
	<input type="text" name="from_date" id='from_date' placeholder="Starting Date" value="<?php if(isset($_GET['from_date'])) echo $_GET['from_date'];?>"/>
	<br>
	<br>
	To:
	<input type="text" name="to_date" id='to_date' placeholder="Ending Date" value="<?php if(isset($_GET['to_date'])) echo $_GET['to_date'];?>"/>
	<br>
	<br>
	<input type="submit" value="Submit" />
	<?php 
		if($searching_date) echo '<a href="index.php?controller=posts">View ALL</a>'
	?>
</form> 
<?php
echo '<div><h2>WORKS LIST</h2></div>';
echo '<div><a href="index.php?controller=posts&action=addPost">ADD WORK</a></div>';
echo '<table>';
echo '<tr>
		<th>Work Name</th>
		<th>Starting Date</th>
		<th>Ending Date</th>
		<th>Status</th>
		<th>Action</th>
</tr>';
foreach ($posts as $post) {
	echo '<tr>
	<td><a href="index.php?controller=posts&action=showPost&id=' . $post->id . '">' . $post->work_name . '</a></td>
	<td>' . $post->starting_date . '</td>
	<td>' . $post->ending_date . '</td>
	<td>'; 
		if($post->status == 1) 
			echo 'Planning'; 
		elseif($post->status == 2) 
			echo 'Doing'; 
		else 
			echo 'Complete';  
	echo '</td>
	<td><a href="index.php?controller=posts&action=addPost&id=' . $post->id . '">Edit</a></td>
	<td><a href="index.php?controller=posts&id=' . $post->id . '">Delete</a></td>
  </tr>';
}
echo '</table>';
?>