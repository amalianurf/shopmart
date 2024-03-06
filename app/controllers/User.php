<?php 

class User extends Controller {
    public function login() {
        $this->view("login");
    }

    public function registration() {
        $this->view("user/registration");
    }

    public function authentication() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? md5($_POST["password"]) : "";
    
            if (empty($email) || empty($password)) {
                $_SESSION["fail_message"] = "Harap lengkapi semua data.";
                exit;
            } else {
                $this->model("UserModel")->login($email, $password);
            }
        }
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $full_name = isset($_POST["full-name"]) ? $_POST["full-name"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? md5($_POST["password"]) : "";
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
            $birth_place = isset($_POST["birth-place"]) ? $_POST["birth-place"] : "";
            $birth_date = isset($_POST["birth-date"]) ? $_POST["birth-date"] : "";
            $address = isset($_POST["address"]) ? $_POST["address"] : "";
            $profile = isset($_FILES["profile"]["name"]) ? uniqid() . "_" . $_FILES["profile"]["name"] : "";
    
            $uploadDir = "./public/img/profile/";
            $uploadedFile = $uploadDir . basename($profile);
            if (move_uploaded_file($_FILES["profile"]["tmp_name"], $uploadedFile)) {
                $uploadedFile = $uploadDir . basename($profile);
            } else {
                $_SESSION["fail_message"] = "Gagal mengunggah gambar.";
                header("Location: " . BASEURL . "/registration");
                exit;
            }

            $data_user = [
                "nama"=> $full_name,
                "email"=> $email,
                "no_hp"=> $phone,
                "password"=> $password,
                "jenis_kelamin"=> $gender,
                "tempat_lahir"=> $birth_place,
                "tanggal_lahir"=> $birth_date,
                "alamat" => $address,
                "photo_profil"=> $profile
            ];

            $this->model("UserModel")->registration($data_user);
        }
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASEURL);
    }

    public function profile($isEdit = false) {
        $data = [];
        $data["cssLinks"] = [
            BASEURL . "/public/css/profile.css"
        ];

        $data["edit"] = $isEdit == 'edit' ? true : false;
        if (isset($_SESSION["email"])) {
            $data["user"] = $this->model("UserModel")->getUserByEmail($_SESSION["email"]);
        }
        $data["action"] = "profile/update/" . $data["user"][0]["id_user"];
        $data["categories"] = $this->model("CategoryModel")->getAll();

        $this->view("components/header", $data);
        $this->view("user/profile", $data);
        $this->view("components/footer");
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
        $data["users"] = $this->model("UserModel")->getAll();

        $this->view("components/header", $data);
        $this->view("admin/users", $data);
        $this->view("components/footer");
    }

    public function add() {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css"
        ];

        $data["title"] = "Tambah User";
        $data["action"] = "registration/register";

        $data["user"][0]["nama"] = "";
        $data["user"][0]["email"] = "";
        $data["user"][0]["no_hp"] = "";
        $data["user"][0]["tempat_lahir"] = "";
        $data["user"][0]["tanggal_lahir"] = "";
        $data["user"][0]["alamat"] = "";

        $this->view("components/header", $data);
        $this->view("admin/user-form", $data);
        $this->view("components/footer");
    }

    public function edit($id) {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css"
        ];

        $data["title"] = "Edit User";
        $data["action"] = "admin/users/update/" . $id;
        $data["user"] = $this->model("UserModel")->getUserById($id);

        $this->view("components/header", $data);
        $this->view("admin/user-form", $data);
        $this->view("components/footer");
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $full_name = isset($_POST["full-name"]) ? $_POST["full-name"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : null;
            $password = isset($_POST["password"]) ? md5($_POST["password"]) : null;
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
            $birth_place = isset($_POST["birth-place"]) ? $_POST["birth-place"] : "";
            $birth_date = isset($_POST["birth-date"]) ? $_POST["birth-date"] : "";
            $address = isset($_POST["address"]) ? $_POST["address"] : "";
            $profile = isset($_FILES["profile"]["name"]) ? $_FILES["profile"]["name"] : null;

            if (!empty($profile)) {
                $profile = uniqid() . "_" . $_FILES["profile"]["name"];
                $uploadDir = "./public/img/profile/";
                $uploadedFile = $uploadDir . basename($profile);
                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $uploadedFile)) {
                    $uploadedFile = $uploadDir . basename($profile);
                } else {
                    $_SESSION["fail_message"] = "Gagal mengunggah gambar.";
                    header("Location: " . BASEURL . "/admin/users/edit/" . $id);
                    exit;
                }
            }

            $data_user = [
                "id"=> $id,
                "nama"=> $full_name,
                "email"=> $email,
                "no_hp"=> $phone,
                "password"=> $password,
                "jenis_kelamin"=> $gender,
                "tempat_lahir"=> $birth_place,
                "tanggal_lahir"=> $birth_date,
                "alamat" => $address,
                "photo_profil"=> $profile
            ];

            $this->model("UserModel")->edit($data_user);
        }
    }

    public function delete($id) {
        $this->model("UserModel")->delete($id);
    }
}