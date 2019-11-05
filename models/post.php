<?php
class Post
{
	public $id;
	public $work_name;
	public $starting_date;
	public $ending_date;
	public $status;

	function __construct($id, $work_name, $starting_date, $ending_date, $status)
	{
		$this->id = $id;
		$this->work_name = $work_name;
		$this->starting_date = $starting_date;
		$this->ending_date = $ending_date;
		$this->status = $status;
	}

	static function all($find_form_date,$find_to_date)
	{
		$list = [];
		$sql = 'SELECT * FROM works';
		if(!empty($find_form_date) && $find_to_date) {
			$sql = 'SELECT * FROM works WHERE starting_date  >= :find_form_date AND ending_date <= :find_to_date';
			$db = DB::getInstance();
			$req = $db->prepare($sql);
			$req->bindParam(":find_form_date", $find_form_date);
			$req->bindParam(":find_to_date", $find_to_date);
			$req->execute();
		} else {
			$db = DB::getInstance();
			$req = $db->query($sql);
		}
		
		foreach ($req->fetchAll() as $item) {
			$list[] = new Post($item['id'], $item['work_name'], $item['starting_date'], $item['ending_date'], $item['status']);
		}

		return $list;
	}
	
	static function add($param)
	{
		if(!empty($param['id'])) 
		{
			$sql = "UPDATE works SET work_name=:work_name, starting_date=:starting_date, ending_date=:ending_date, status=:status WHERE id=:id";
			$data = [
				'work_name' => $param['work_name'],
				'starting_date' => $param['starting_date'],
				'ending_date' => $param['ending_date'],
				'status' => $param['status'],
				'id' => $param['id'],
			];
		} else {
			$sql = "INSERT INTO works (work_name, starting_date, ending_date, status) VALUES (:work_name, :starting_date, :ending_date, :status)";
			$data = [
				'work_name' => $param['work_name'],
				'starting_date' => $param['starting_date'],
				'ending_date' => $param['ending_date'],
				'status' => $param['status'],
			];
		}
		$db = DB::getInstance();
		$req= $db->prepare($sql);
		$req->execute($data);
		return null;
	}
	
	static function find($id)
	{
		$db = DB::getInstance();
		$data = [
			'id' => $id
		];
		$sql = 'SELECT * FROM works WHERE id = :id';
		$req = $db->prepare($sql);
		$req->execute($data);
		$item = $req->fetch();
		if (isset($item['id'])) {
			return new Post($item['id'], $item['work_name'], $item['starting_date'], $item['ending_date'], $item['status']);
		}
		return null;
	}
	
	static function del($id)
	{
		$db = DB::getInstance();
		$data = [
			'id' => $id
		];
		$sql = 'DELETE FROM works WHERE id = :id';
		$req = $db->prepare($sql);
		$req->execute($data);
		return null;
	}
}
?>