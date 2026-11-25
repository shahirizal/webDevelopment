<?php

class MyGuestbookModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // READ all records
    public function readAll() {
        $sql = "SELECT * FROM myguestbook ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    // CREATE a new record
    public function create($data) {
        $sql = "INSERT INTO myguestbook (user, email, postdate, posttime, comment)
                VALUES (:user, :email, :postdate, :posttime, :comment)";
        $stmt = $this->db->prepare($sql);

        $user     = $data['name'];
        $email    = $data['email'];
        $postdate = date("Y-m-d");
        $posttime = date("H:i:s");
        $comment  = $data['comment'];

        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':postdate', $postdate, PDO::PARAM_STR);
        $stmt->bindParam(':posttime', $posttime, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

        $result = $stmt->execute();
        return $result;
    }

    // READ a single record by ID
    public function readById($id) {
        $sql = "SELECT * FROM myguestbook WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // UPDATE a record
    public function update($data) {
        $sql = "UPDATE myguestbook
                SET user = :user, email = :email, comment = :comment
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $id      = $data['id'];
        $user    = $data['name'];
        $email   = $data['email'];
        $comment = $data['comment'];

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

        $result = $stmt->execute();
        return $result;
    }

    // DELETE a record
    public function delete($id) {
        $sql = "DELETE FROM myguestbook WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }
}

?>