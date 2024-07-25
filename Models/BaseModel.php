<?php
class BaseModel extends Database{
    protected $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }

    public function all($table, $select = ['*'],$limit = 15){
        $select = implode(',', $select);
        $sql = "SELECT " . $select . " FROM " . $table . " LIMIT " . $limit;
        $query = $this->_query($sql);
        $data = [];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        var_dump($data);
    }

    public function findById($id){

    }

    public function store($data){

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