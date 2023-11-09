<?php 

class Cart extends Controller {
    public function index() {
        $data["cssLinks"] = [
            BASEURL . "/public/css/cart.css"
        ];
        $row = $this->model("UserModel")->getUserByEmail($_SESSION["email"]);

        $data["id_user"] = $row[0]["id_user"];
        $data["cart"] = $this->model("CartModel")->getByUser($row[0]["id_user"]);
        $data["categories"] = $this->model("CategoryModel")->getAll();

        $this->view("components/header", $data);
        $this->view("user/cart", $data);
    }

    public function admin() {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css",
            "https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"
        ];
        $data["jsLinks"] = [
            "https://code.jquery.com/jquery-3.6.0.min.js",
            "https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js",
            "https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"
        ];
        $data["cart"] = $this->model("CartModel")->getAll();

        $this->view("components/header", $data);
        $this->view("admin/cart", $data);
        $this->view("components/footer");
    }

    public function add() {
        if (isset($_SESSION["email"])) {
            $row = $this->model("UserModel")->getUserByEmail($_SESSION["email"]);
            $data["id_user"] = $row[0]["id_user"];

            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["quantity"]) && isset($_POST["id_product"])) {
                $data["id_produk"] = $_POST["id_product"];
                for ($i = 0; $i < $_POST["quantity"]; $i++) {
                    $this->model("CartModel")->add($data);
                };
            }
        } else {
            $_SESSION["fail_message"] = "Harap Login Dulu!";
            $response = [
                "redirect" => BASEURL . "/login"
            ];

            echo json_encode($response);
        }
    }

    public function delete($id) {
        if (isset($_SESSION["email"])) {
            $row = $this->model("UserModel")->getUserByEmail($_SESSION["email"]);

            $data["id_user"] = $row[0]["id_user"];
            $data["id_produk"] = $id;

            $this->model("CartModel")->delete($data);
        }
    }
}