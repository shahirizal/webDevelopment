<?php

class GuestbookController extends Controller {
    private $model;

    public function __construct() {
        $this->model = $this->model("myguestbookmodel");
    }

    public function index() {
        $this->view("mainmenu");
    }

    public function lists() {
        $entries = $this->model->readAll();
        $this->view("list", ["result" => $entries]);
    }

    public function form($id = null) {
        if ($id === null) {
            $this->view("form");
        } else {
            $entry = $this->model->readById($id);
            $this->view("edit", ["result" => $entry]);
        }
    }

    public function save() {
        $data = $_POST;
        if (!empty($data['id'])) {
            $this->model->update($data);
        } else {
            $this->model->create($data);
        }
        header("Location: " . BASE_URL . "guestbookcontroller/lists");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: " . BASE_URL . "guestbookcontroller/lists");
    }
}

?>