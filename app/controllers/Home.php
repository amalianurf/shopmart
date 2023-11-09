<?php 

class Home extends Controller {
    public function index() {
        $data['cssLinks'] = [
            BASEURL . '/public/css/home.css'
        ];
        $data['jsLinks'] = [
            BASEURL . '/public/js/home.js'
        ];
        $data['discount-products'] = $this->model("ProductModel")->getDiscountProduct(5);
        $data['popular-products'] = $this->model("ProductModel")->getPopularProduct(5);
        $data['latest-products'] = $this->model("ProductModel")->getLatestProduct(5);
        $data['categories'] = $this->model("CategoryModel")->getAll();

        $this->view('components/header', $data);
        $this->view('user/home', $data);
        $this->view('components/footer');
    }
}