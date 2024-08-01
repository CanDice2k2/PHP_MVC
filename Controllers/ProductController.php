<?php


class ProductController extends BaseController{

    private $productModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    

    public function index(){
        
        $product = $this->productModel->getAll(
            ['*'], [
            'column' => 'id', 
            'orderType' => 'desc'], 
            10);
        $this->view('frontend.products.index',[
            'products' => $product
        ]);
    }
    public function show(){
        $product = $this->productModel->findById(1);
        return $this->view('frontend.products.show',[
           'product' => $product
        ]);
    }

    public function store(){
        $data = [
            'name' => 'Iphone 1',
            'price' => 10000000,
            'image' => null,
            'category_id' => 2
        ];
        $this->productModel->store($data);
    }

    public function update(){
        $id = $_GET['id'];
        $data = [
            'name' => 'Iphone 12',
            'price' => 123456,
        ];
        $this->productModel->updateData($id,$data);
    }

    public function delete(){
        $id = $_GET['id'];
        $this->productModel->destroy($id);
    }
}

?>