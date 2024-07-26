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
        
    }

    public function show(){
        $id = $_GET['id'];
        $categories = $this->categoryModel->findById($id);
        echo '<pre>';
        print_r($categories);
    }
}
?>