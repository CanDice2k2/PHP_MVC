<?php
class CategoryController extends BaseController{   
    private $categoryModel;
    
    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
    }

    public function index(){
        $pageTitle = 'Danh sách danh mục';
        $categories = $this->categoryModel->getAll(['*']);
        return $this->view('frontend.categories.index', ['categories' => $categories,
        'pageTitle' => $pageTitle]);
    }

    public function store(){
        echo __METHOD__;
    }

    public function show(){
        $id = $_GET['id'];
        $categories = $this->categoryModel->findById($id);
        echo '<pre>';
        print_r($categories);
    }

    public function update(){
        $id = $_GET['id'];
        $data = [
            'name' => 'Iphone 12',
            'price' => 123456,
            'image' => '123.jpg',
            'category_id' => 3
        ];
        $this->categoryModel->updateData($id,$data);
    }

    public function delete(){
        $id = $_GET['id'];
        $this->categoryModel->destroy($id);
    }
}
?>