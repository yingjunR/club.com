<?php
class Model{

	static $connections = array();

	public $conf = 'default';
	public $table = false;
	public $db;
	public $primaryKey = 'id';
	public $id;

	public function __construct(){
		// Initialize some variable
		if($this->table === false){
			$this->table = strtolower(get_class($this));
		}
		
		// Connect to the database
		$conf = Conf::$databases[$this->conf];
		if(isset(Model::$connections[$this->conf])){
			$this->db = Model::$connections[$this->conf];
			return true;
		}
		try {
			$pdo = new PDO(
				'mysql:host='.$conf['host'].';dbname='.$conf['database'].';',
				$conf['login'],
				$conf['password'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
				);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

			Model::$connections[$this->conf]=$pdo;
			$this->db = $pdo;
		}catch(PDOException $e){
			if(Conf::$debug >= 1){
				die($e->getMessage());
			}else{
				die('Impossible to conncect to the database');
			}
		}	

	}

	public function find($req){
		$sql = 'SELECT ';

		if(isset($req['fields'])){
			if(is_array($req['fields'])){
				$sql .= implode(', ',$req['fields']);
			}else{
				$sql .= $req['fields'];
			}
		}else{
			$sql .='*';
		}

		$sql .= 'FROM '.$this->table.' as ' .get_class($this).' ';

			// Construction of the condition
		if(isset($req['conditions'])){
			$sql .= 'WHERE ';
			if(!is_array($req['conditions'])){
				$sql .=$req['conditions'];

			}else{
				$cond = array();
				foreach($req['conditions'] as $k=>$v){
					if(!is_numeric($v)){
						$v = '"'.$v=addslashes($v).'"';

					}

					$cond[] = "$k=$v";
				}
				$sql .= implode(' AND ',$cond);
			}
			
		}
		//die($sql);
		$pre = $this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}

	public function findFirst($req){
		return current($this->find($req));
	}

	public function save($data){
		$key = $this->primaryKey;
		$fields = array();
		$d = array();
		foreach ($data as $k=>$v) {
			if($k!=$this->primaryKey){
				$fields[] = "$k=:$k";
				$d[":$k"] = $v;
			}
			elseif(!empty($v)){
				$d[":$k"] = $v;
			}

		}
 		if(isset($data->$key) && !empty($data->$key)){
			$sql = 'UPDATE '.$this->table.' SET '.implode(',',$fields). ' WHERE '.$key. '=:'.$key;
			$this->id = $data->$key;
			$action = 'update';
		}else{
			$sql = 'INSERT INTO '.$this->table.' SET '.implode(',',$fields);
			$action='insert';
		}
		// debug($data);
		// debug($sql);
		// die();
		$pre = $this->db->prepare($sql);
		$pre->execute($d);
		if($action == 'insert'){
			$this->id = $this->db->lastInsertId();
		}
	}
}
?>