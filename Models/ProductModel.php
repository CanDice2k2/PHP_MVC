<?php
class ProductModel extends BaseModel{
    const TABLE = 'products';

    public function getAll($select = ['*'], $limit = 15){
        return $this->all(self::TABLE, $select, $limit);
    }

    public function findById($id){
        // echo __METHOD__;
        return [
            'id' =>1,
            'name'=> 'Iphone 15'
        ];
    }
}

?>