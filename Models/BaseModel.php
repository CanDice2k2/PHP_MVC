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

    public function create($table,$data = []){
        $columns = implode(',',array_keys($data));

        $newValues = array_map(function($value){
            return "'" . $value . "'";
        }, array_values($data));

        $newValues = implode(',',$newValues);

        $sql = "INSERT INTO ${table}($columns) VALUES ($newValues)";

        $this->_query($sql);
    }

    public function update($table, $id, $data = []){
        $newValues = [];
        foreach($data as $key=> $values){
            $newValues[] = $key . "= '" . $values. "'";
        }
        $newValues = implode(',',$newValues);
        $sql = "UPDATE ${table} SET ${newValues} WHERE id = ${id}";
        echo $sql;
        $this->_query($sql);
    }

    public function delete($table, $id){
        $sql = "DELETE FROM ${table} WHERE id = ${id}";
        $this->_query($sql);
    }

    private function _query($sql){
       return mysqli_query($this->connect, $sql);
    }
}

?>