<?php 

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $this->db->query($query);
        $this->db->bind("ss", $email, $password);
        $row = $this->db->result();
        if (!empty($row)) {
            $_SESSION["email"] = $email;
            $_SESSION["nama"] = $row[0]["nama"];
            $_SESSION["status"] = "logged in";

            $role = $row[0]["role"];

            if ($role === "admin") {
                $_SESSION["admin"] = true;
            }
            header("Location: " . BASEURL);
        } else {
            $_SESSION["fail_message"] = "Password atau email salah!";
            header("Location: " . BASEURL . "/login");
        }
    }

    public function registration($data) {
        $this->db->query("SELECT id FROM users WHERE email = ?");
        $this->db->bind("s", $data["email"]);
        $row = $this->db->result();
        if (empty($row)) {
            $this->db->query("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, 'user')");
            $this->db->bind("sss", $data["nama"], $data["email"], $data["password"]);
            $this->db->execute();

            $this->db->query("SELECT * FROM users WHERE email=? AND password=?");
            $this->db->bind("ss", $data["email"], $data["password"]);
            $row = $this->db->result();
            if (!empty($row)) {
                $id_user = $row[0]["id"];

                $this->db->query("INSERT INTO detail_user (id_user, no_hp, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, photo_profil) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $this->db->bind("issssss", $id_user, $data["no_hp"], $data["jenis_kelamin"], $data["tempat_lahir"], $data["tanggal_lahir"], $data["alamat"], $data["photo_profil"]);
                $this->db->execute();
                if (isset($_SESSION["admin"])) {
                    $_SESSION["success_message"] = "Data User Berhasil Ditambahkan!";
                    header("Location: " . BASEURL . "/admin/users/add");
                } else {
                    $_SESSION["success_message"] = "Pendaftaran Berhasil!";
                    header("Location: " . BASEURL . "/login");
                }
            } else {
                if (isset($_SESSION["admin"])) {
                    $_SESSION["fail_message"] = "Data User Gagal Ditambahkan!";
                    header("Location: " . BASEURL . "/admin/users/add");
                } else {
                    $_SESSION["fail_message"] = "Pendaftaran Gagal!";
                    header("Location: " . BASEURL . "/registration");
                }
            }
        } else {
            $_SESSION["fail_message"] = "Email telah terdaftar!";
        }
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users INNER JOIN detail_user ON detail_user.id_user = users.id WHERE detail_user.id_user=?";
        $this->db->query($query);
        $this->db->bind("i", $id);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users INNER JOIN detail_user ON detail_user.id_user = users.id WHERE users.email=?";
        $this->db->query($query);
        $this->db->bind("s", $email);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getAll() {
        $query = "SELECT * FROM users LEFT JOIN detail_user ON detail_user.id_user = users.id WHERE users.role = 'user'";
        $this->db->query($query);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function edit($data) {
        try {
            if (empty($data["email"]) || $data["password"] == md5("")) {
                if (empty($data["email"]) && $data["password"] == md5("")) {
                    $this->db->query("UPDATE users SET nama=? WHERE id=?");
                    $this->db->bind("si", $data["nama"], $data["id"]);
                }

                if (empty($data["email"]) && $data["password"] != md5("")) {
                    $this->db->query("UPDATE users SET nama=?, password=? WHERE id=?");
                    $this->db->bind("ssi", $data["nama"], $data["password"], $data["id"]);
                }

                if ($data["password"] == md5("") && !empty($data["email"])) {
                    $this->db->query("UPDATE users SET nama=?, email=? WHERE id=?");
                    $this->db->bind("ssi", $data["nama"], $data["email"], $data["id"]);
                }
            } else {
                $this->db->query("UPDATE users SET nama=?, email=?, password=? WHERE id=?");
                $this->db->bind("sssi", $data["nama"], $data["email"], $data["password"], $data["id"]);
            }
    
            $this->db->execute();
    
            if (empty($data["jenis_kelamin"]) || empty($data["photo_profil"])) {
                if (empty($data["jenis_kelamin"]) && empty($data["photo_profil"])) {
                    $this->db->query("UPDATE detail_user SET no_hp=?, tempat_lahir=?, tanggal_lahir=?, alamat=? WHERE id_user=?");
                    $this->db->bind("ssssi", $data["no_hp"], $data["tempat_lahir"], $data["tanggal_lahir"], $data["alamat"], $data["id"]);
                }
    
                if (empty($data["jenis_kelamin"]) && !empty($data["photo_profil"])) {
                    $this->db->query("UPDATE detail_user SET no_hp=?, tempat_lahir=?, tanggal_lahir=?, alamat=?, photo_profil=? WHERE id_user=?");
                    $this->db->bind("sssssi", $data["no_hp"], $data["tempat_lahir"], $data["tanggal_lahir"], $data["alamat"], $data["photo_profil"], $data["id"]);
                }
    
                if (empty($data["photo_profil"]) && !empty($data["jenis_kelamin"])) {
                    $this->db->query("UPDATE detail_user SET no_hp=?, jenis_kelamin=?, tempat_lahir=?, tanggal_lahir=?, alamat=? WHERE id_user=?");
                    $this->db->bind("sssssi", $data["no_hp"], $data["jenis_kelamin"], $data["tempat_lahir"], $data["tanggal_lahir"], $data["alamat"], $data["id"]);
                }
            } else {
                $this->db->query("UPDATE detail_user SET no_hp=?, jenis_kelamin=?, tempat_lahir=?, tanggal_lahir=?, alamat=?, photo_profil=? WHERE id_user=?");
                $this->db->bind("ssssssi", $data["no_hp"], $data["jenis_kelamin"], $data["tempat_lahir"], $data["tanggal_lahir"], $data["alamat"], $data["photo_profil"], $data["id"]);
            }
    
            $this->db->execute();

            $_SESSION["success_message"] = "Data User Berhasil Diperbarui!";
            if (isset($_SESSION["admin"])) {
                header("Location: " . BASEURL . "/admin/users/edit/" . $data["id"]);
            } else {
                header("Location: " . BASEURL . "/profile");
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Data User Gagal Diperbarui!";
            if (isset($_SESSION["admin"])) {
                header("Location: " . BASEURL . "/admin/users/edit/" . $data["id"]);
            } else {
                header("Location: " . BASEURL . "/profile");
            }
        }
    }

    public function delete($id) {
        try {
            $this->db->query("DELETE FROM detail_user WHERE id_user=?");
            $this->db->bind("i", $id);
            $this->db->execute();

            $this->db->query("DELETE FROM users WHERE id=?");
            $this->db->bind("i", $id);
            $this->db->execute();

            $_SESSION["success_message"] = "Data User Berhasil Dihapus!";
            header("Location: " . BASEURL . "/admin/users");
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Data User Gagal Dihapus!";
            header("Location: " . BASEURL . "/admin/users");
        }
    }

    public function __destruct() {
        $this->db->close();
    }
}