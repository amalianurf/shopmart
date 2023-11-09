<?php 

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $query = "SELECT produk.*, SUM(review.rating) / COUNT(review.id_produk) AS ratings, COUNT(review.id_produk) AS count_rating FROM produk LEFT JOIN review ON review.id_produk = produk.id GROUP BY produk.id";
        $this->db->query($query);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getDiscountProduct($limit = 100) {
        $query = "SELECT produk.*, SUM(review.rating) / COUNT(review.id_produk) AS ratings, COUNT(review.id_produk) AS count_rating FROM produk LEFT JOIN review ON review.id_produk = produk.id WHERE produk.diskon != 0 GROUP BY produk.id ORDER BY produk.diskon DESC LIMIT ?";
        $this->db->query($query);
        $this->db->bind("i", $limit);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getPopularProduct($limit = 100) {
        $query = "SELECT produk.*, SUM(review.rating) / COUNT(review.id_produk) AS ratings, COUNT(review.id_produk) AS count_rating FROM produk LEFT JOIN review ON review.id_produk = produk.id GROUP BY produk.id ORDER BY count_rating DESC LIMIT ?";
        $this->db->query($query);
        $this->db->bind("i", $limit);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getLatestProduct($limit = 100) {
        $query = "SELECT produk.*, SUM(review.rating) / COUNT(review.id_produk) AS ratings, COUNT(review.id_produk) AS count_rating FROM produk LEFT JOIN review ON review.id_produk = produk.id GROUP BY produk.id ORDER BY produk.id DESC LIMIT ?";
        $this->db->query($query);
        $this->db->bind("i", $limit);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getProductById($id) {
        $query = "SELECT produk.*, SUM(review.rating) / COUNT(review.id_produk) AS ratings, COUNT(review.id_produk) AS count_rating FROM produk LEFT JOIN review ON review.id_produk = produk.id WHERE produk.id=? GROUP BY produk.id";
        $this->db->query($query);
        $this->db->bind("i", $id);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function searchProductByName($keyword) {
        $keyword = '%' . $keyword .'%';
        $query = "SELECT produk.*, SUM(review.rating) / COUNT(review.id_produk) AS ratings, COUNT(review.id_produk) AS count_rating FROM produk LEFT JOIN review ON review.id_produk = produk.id WHERE produk.nama_produk LIKE ? GROUP BY produk.id";
        $this->db->query($query);
        $this->db->bind("s", $keyword);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getProductByCategory($category) {
        $query = "SELECT produk.*, kategori_produk.*, SUM(review.rating) / COUNT(review.id_produk) AS ratings, COUNT(review.id_produk) AS count_rating FROM produk LEFT JOIN kategori_produk ON produk.kode_kategori = kategori_produk.kode LEFT JOIN review ON review.id_produk = produk.id WHERE kategori_produk.nama_kategori=? GROUP BY produk.id";
        $this->db->query($query);
        $this->db->bind("s", $category);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function add($data) {
        try {
            $query = "INSERT INTO produk (kode_kategori, nama_produk, deskripsi, harga, diskon, stok, thumbnail) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($query);
            $this->db->bind("sssiiis", $data["kode_kategori"], $data["nama_produk"], $data["deskripsi"], $data["harga"], $data["diskon"], $data["stok"], $data["thumbnail"]);
            $this->db->execute();

            $_SESSION["success_message"] = "Produk Berhasil Ditambahkan!";
            header("Location: " . BASEURL . "/admin/products/add");
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Produk Gagal Ditambahkan!";
            header("Location: " . BASEURL . "/admin/products/add");
        }
    }

    public function edit($data) {
        try {    
            if ($data["thumbnail"] == "") {
                $this->db->query("UPDATE produk SET kode_kategori=?, nama_produk=?, deskripsi=?, harga=?, diskon=?, stok=? WHERE id=?");
                $this->db->bind("sssiiii", $data["kode_kategori"], $data["nama_produk"], $data["deskripsi"], $data["harga"], $data["diskon"], $data["stok"], $data["id"]);
            } else {
                $this->db->query("UPDATE produk SET kode_kategori=?, nama_produk=?, deskripsi=?, harga=?, diskon=?, stok=?, thumbnail=? WHERE id=?");
                $this->db->bind("sssiiisi", $data["kode_kategori"], $data["nama_produk"], $data["deskripsi"], $data["harga"], $data["diskon"], $data["stok"], $data["thumbnail"], $data["id"]);
            }
    
            $this->db->execute();

            $_SESSION["success_message"] = "Produk Berhasil Diperbarui!";
            header("Location: " . BASEURL . "/admin/products/edit/" . $data["id"]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Produk Gagal Diperbarui!";
            header("Location: " . BASEURL . "/admin/products/edit/" . $data["id"]);
        }
    }

    public function delete($id) {
        try {
            $this->db->query("DELETE FROM produk WHERE id=?");
            $this->db->bind("i", $id);
            $this->db->execute();

            $_SESSION["success_message"] = "Produk Berhasil Dihapus!";
            header("Location: " . BASEURL . "/admin/products");
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Produk Gagal Dihapus!";
            header("Location: " . BASEURL . "/admin/products");
        }
    }

    public function __destruct() {
        $this->db->close();
    }
}