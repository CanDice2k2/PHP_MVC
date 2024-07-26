<?php
class BaseModel extends Database{
    protected $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }

    public function all($table, $select = ['*'], $orderBys = ['name' => 'desc'],$limit = 15){
        $columns = implode(',', $select);
        $orderByString = implode(' ',$orderBys); 
        if($orderByString){
            $orderByString = 'ORDER BY ' . $orderByString;
        }
        $sql = "SELECT " . $columns . " FROM " . $table ." " . $orderByString .  " LIMIT " . $limit;
        $query = $this->_query($sql);
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
        return $data;
    }

    public function find($table, $id){
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id . " LIMIT 1";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    public function create($table,$data){
        $columns = implode(',',array_keys($data));
        $values = implode("','",array_values($data));
        $sql = "INSERT INTO " . $table ."(" . $columns . ") VALUES(" . "'" . $values . "'" . ")";
        echo $sql;
    }

    public function update($data, $id){

    }

    public function delete($id){

    }

    private function _query($sql){
       return mysqli_query($this->connect, $sql);
    }
}

?>