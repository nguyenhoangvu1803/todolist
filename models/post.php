<?php
class Post
{
	public $id;
	public $work_name;
	public $starting_date;
	public $ending_date;
	public $status;

	function __construct($id, $workName, $startingDate, $endingDate, $status)
	{
		$this->id = $id;
		$this->work_name = $workName;
		$this->starting_date = $startingDate;
		$this->ending_date = $endingDate;
		$this->status = $status;
	}

	public function all($findFormDate,$findToDate)
	{
		$list = [];
		$sql = 'SELECT * FROM works';
		if(!empty($findFormDate) && $findToDate) {
			$sql = 'SELECT * FROM works WHERE starting_date  >= :findFormDate AND ending_date <= :findToDate';
			$db = DB::getInstance();
			$req = $db->prepare($sql);
			$req->bindParam(":findFormDate", $findFormDate);
			$req->bindParam(":findToDate", $findToDate);
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
	
	public function add($param)
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
	
	public function find($id)
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
	
	public function del($id)
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

