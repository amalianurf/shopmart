<?php 

class CartModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $query = "SELECT transaksi.*, produk.*, users.*, transaksi.*, COUNT(transaksi.id_produk) AS total_produk, SUM(produk.harga) AS total_harga FROM transaksi LEFT JOIN users ON users.id = transaksi.id_user LEFT JOIN produk ON produk.id = transaksi.id_produk WHERE transaksi.status='oncart' GROUP BY transaksi.id_user, transaksi.id_produk";
        $this->db->query($query);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function getByUser($id) {
        $query = "SELECT transaksi.*, produk.*, users.*, COUNT(transaksi.id_produk) AS total_produk, SUM(produk.harga) AS total_harga FROM transaksi LEFT JOIN users ON users.id = transaksi.id_user LEFT JOIN produk ON produk.id = transaksi.id_produk WHERE transaksi.id_user=? AND transaksi.status='oncart' GROUP BY transaksi.id_user, transaksi.id_produk ORDER BY transaksi.id DESC";
        $this->db->query($query);
        $this->db->bind("i", $id);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function add($data) {
        try {
            $this->db->query("INSERT INTO transaksi (id_user, id_produk, status) VALUES (?, ?, ?)");
            $this->db->bind("iis", $data["id_user"], $data["id_produk"], "oncart");
            $this->db->execute();
            $_SESSION["success_message"] = "Berhasil Masuk ke Keranjang!";
            header("Location: " . BASEURL . "/detail-product/" . $data["id_produk"]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION["fail_message"] = "Gagal Ditambahkan ke Keranjang!";
            header("Location: " . BASEURL . "/detail-product/" . $data["id_produk"]);
        }
    }

    public function delete($data) {
        $query = "DELETE FROM transaksi WHERE id_user=? AND id_produk=?";
        $this->db->query($query);
        $this->db->bind("ii", $data["id_user"], $data["id_produk"]);
        $this->db->execute();
        header("Location: " . BASEURL . "/cart");
    }

    public function __destruct() {
        $this->db->close();
    }
}