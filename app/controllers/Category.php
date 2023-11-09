<?php 

class Category extends Controller {
    public function index() {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css",
            "https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"
        ];
        $data["jsLinks"] = [
            "https://code.jquery.com/jquery-3.6.0.min.js",
            "https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js",
            "https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"
        ];
        $data["categories"] = $this->model("CategoryModel")->getAll();
        $data["products"] = $this->model("ProductModel")->getAll();

        $this->view("components/header", $data);
        $this->view("admin/categories", $data);
        $this->view("components/footer");
    }

    public function add() {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css"
        ];

        $data["title"] = "Tambah Kategori";
        $data["action"] = "admin/categories/add";

        $data["category"][0]["kode"] = "";
        $data["category"][0]["nama_kategori"] = "";

        $this->view("components/header", $data);
        $this->view("admin/category-form", $data);
        $this->view("components/footer");
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $code = isset($_POST["code"]) ? $_POST["code"] : "";
            $name = isset($_POST["name"]) ? $_POST["name"] : "";

            $data_category = [
                "kode"=> $code,
                "nama_kategori"=> $name
            ];

            $this->model("CategoryModel")->add($data_category);
        }
    }

    public function edit($code) {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css"
        ];

        $data["title"] = "Edit Kategori";
        $data["action"] = "admin/categories/update/" . $code;

        $data["category"] = $this->model("CategoryModel")->getCategoryByCode($code);

        $this->view("components/header", $data);
        $this->view("admin/category-form", $data);
        $this->view("components/footer");
    }

    public function update($code) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = isset($_POST["name"]) ? $_POST["name"] : "";

            $data_category = [
                "kode"=> $code,
                "nama_kategori"=> $name
            ];

            $this->model("CategoryModel")->edit($data_category);
        }
    }

    public function delete($code) {
        $this->model("CategoryModel")->delete($code);
    }
}