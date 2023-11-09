<?php 

class CategoryModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $query = "SELECT * FROM kategori_produk";
        $this->db->query($query);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getCategoryByCode($code) {
        $query = "SELECT * FROM kategori_produk WHERE kode=?";
        $this->db->query($query);
        $this->db->bind("s", $code);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function add($data) {
        try {
            $query = "INSERT INTO kategori_produk (kode, nama_kategori) VALUES (?, ?)";
            $this->db->query($query);
            $this->db->bind("ss", $data["kode"], $data["nama_kategori"]);
            $this->db->execute();

            $_SESSION["success_message"] = "Kategori Produk Berhasil Ditambahkan!";
            header("Location: " . BASEURL . "/admin/categories/add");
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Kategori Produk Gagal Ditambahkan!";
            header("Location: " . BASEURL . "/admin/categories/add");
        }
    }

    public function edit($data) {
        try {
            $query = "UPDATE kategori_produk SET nama_kategori=? WHERE kode=?";
            $this->db->query($query);
            $this->db->bind("ss", $data["nama_kategori"], $data["kode"]);
            $this->db->execute();

            $_SESSION["success_message"] = "Kategori Produk Berhasil Diperbarui!";
            header("Location: " . BASEURL . "/admin/categories/edit/" . $data["kode"]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Kategori Produk Gagal Diperbarui!";
            header("Location: " . BASEURL . "/admin/categories/edit/" . $data["kode"]);
        }
    }

    public function delete($code) {
        try {
            $this->db->query("DELETE FROM kategori_produk WHERE kode=?");
            $this->db->bind("s", $code);
            $this->db->execute();

            $_SESSION["success_message"] = "Kategori Produk Berhasil Dihapus!";
            header("Location: " . BASEURL . "/admin/categories");
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Kategori Produk Gagal Dihapus!";
            header("Location: " . BASEURL . "/admin/categories");
        }
    }

    public function __destruct() {
        $this->db->close();
    }
}