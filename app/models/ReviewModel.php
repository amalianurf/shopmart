<?php 

class ReviewModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getReviewProduct($id_product) {
        $query = "SELECT * FROM review LEFT JOIN users ON users.id = review.id_user WHERE review.id_produk=?";
        $this->db->query($query);
        $this->db->bind("i", $id_product);
        $row = $this->db->result();
        if (!empty($row)) {
            return $row;
        } else {
            return [];
        }
    }

    public function __destruct() {
        $this->db->close();
    }
}