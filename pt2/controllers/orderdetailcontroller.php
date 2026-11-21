<?php

class OrderDetailController extends Controller {
    private $detailModel;
    private $orderModel;
    private $productModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->detailModel  = $this->model("orderdetailmodel");
        $this->orderModel   = $this->model("ordermodel");
        $this->productModel = $this->model("productmodel");
    }

    public function index($orderNum = null) {
        if ($orderNum === null || $orderNum === '') {
            exit;
        }
        $order = $this->orderModel->readById($orderNum);
        if (!$order) {
            exit;
        }
        $_SESSION['current_order_num'] = $orderNum;
        $this->view("orderdetails", [
            "order"    => $order,
            "details"  => $this->detailModel->readByOrder($orderNum),
            "products" => $this->productModel->readAll()
        ]);
    }

    public function save() {
        $data = $_POST;
        $this->detailModel->create($data);
        $orderNum = $_SESSION['current_order_num'] ?? ($data['order_num'] ?? null);
        $this->index($orderNum);
    }

    public function edit($id) {
        $detail = $this->detailModel->readById($id);
        if (!$detail) {
            exit;
        }
        $_SESSION['current_order_num'] = $detail['fld_order_num'];
        $this->view("orderdetails", [
            "order"    => $this->orderModel->readById($detail['fld_order_num']),
            "details"  => $this->detailModel->readByOrder($detail['fld_order_num']),
            "products" => $this->productModel->readAll(),
            "adetail"  => $detail
        ]);
    }

    public function update() {
        $data = $_POST;
        $this->detailModel->update($data);
        $orderNum = $_SESSION['current_order_num'] ?? ($data['order_num'] ?? null);
        $this->index($orderNum);
    }

    public function delete($id) {
        $detail = $this->detailModel->readById($id);
        if (!$detail) {
            exit;
        }
        $orderNum = $detail['fld_order_num'];
        $_SESSION['current_order_num'] = $orderNum;
        $this->detailModel->delete($id);
        $this->index($orderNum);
    }
}

?>