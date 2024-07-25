<?php
class CategoryController extends BaseController{    
    public function index(){
        return $this->view('frontend.categories.index');
    }

    public function show(){
        echo __METHOD__;
    }
}
?>