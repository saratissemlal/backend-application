<?php
namespace BDD;

class Bdd{

private $pdo;

private $q;

public function __construct($login, $pass, $db_name, $host = "localhost"){
	$this->pdo = new \PDO("mysql:dbname=$db_name;host=$host", $login, $pass);
	$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
	$this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

    $this->q = '';
}

public function query($q,$p = false){
	if ($p) {
		$r = $this->pdo->prepare($q);
		$r->execute($p);
	}else{
		$r = $this->pdo->query($q);
	}
	return $r;
}

    public function select($cells, $table){

        $this->q = "";

        $this->q .= "SELECT $cells FROM $table";

        return $this;

    }

    public function where($where){

        $this->q .= " WHERE $where";

        return $this;

    }

    public function order($order, $type = 'DESC'){

        $this->q .= " ORDER BY $order $type";

        return $this;

    }

    public function limit($limit)
    {

        $this->q .= " LIMIT $limit";

        return $this;

    }

    public function get($params = []){

        return $this->query($this->q, $params)->fetchAll();

    }

    public function find($params = [], $redirect = false){

        $data = $this->query($this->q, $params)->fetch();

        if(!empty($data)) return $data;

        if($redirect) \Func::redirect($redirect);

    }

}