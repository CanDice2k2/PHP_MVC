<?php


class ProductController extends BaseController{

    private $productModel;

    public function __construct()
    {
        $this->Model('ProductModel');
        $this->productModel = new ProductModel;
    }

    

    public function index(){
        
        $product = $this->productModel->getAll(['*'], 2);
        $this->view('frontend.products.index',[
            'pageTitle' => 'Danh sách sản phẩm',
            'product' => $product
        ]);
    }
    public function show(){
        $product = $this->productModel->findById(1);
        return $this->view('frontend.products.show',[
           'product' => $product
        ]);
    }

    
}

?>