<?php 
ob_start(); 
?>
<div class="card shadow border-0 border-start border-5 mb-4" style="background-color: #bae6fd; border-color: #0ea5e9 !important;">
    <div class="card-body">
        <h2 class="mb-1 text-dark">Order Details</h2>
        <p class="text-muted mb-0">Order #O001 for Alice Johnson</p>
    </div>
</div>

<div class="card shadow-sm mb-4 bg-white border-0">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4"><strong>Order Date</strong><br>2026-10-03</div>
            <div class="col-md-4"><strong>Staff</strong><br>Jane Smith</div>
            <div class="col-md-4"><strong>Customer</strong><br>Alice Johnson</div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4 bg-white border-0">
    <div class="card-body">
        <h5 class="mb-3 text-dark"><i class="bi bi-cart-plus me-2" style="color: #0ea5e9;"></i>Add Product</h5>
        <hr>
        <form action="" method="post" class="needs-validation" novalidate>
            <input type="hidden" name="order_num" value="O001">
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="product_num" class="form-label">Product <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="product_num" id="product_num" class="form-select" required>
                        <option value="">Select Product</option>
                        <option value="P001">NexusDock Pro 3-in-1 Wireless (Stock = 10)</option>
                        <option value="P002">NexusDock Compact Pad (Stock = 5)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="quantity" id="quantity" type="number" class="form-control" min="1" value="1" required>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <button type="submit" class="btn text-white" style="background-color: #0ea5e9;"><i class="bi bi-save me-1"></i>Add Product</button>
            <a href="#" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<div class="card shadow-sm bg-white border-0">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0 text-dark"><i class="bi bi-table me-2" style="color: #0ea5e9;"></i>Products in Order</h5>
            <a href="invoice.php" class="btn btn-success"><i class="bi bi-receipt me-1"></i>View Invoice</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>NexusDock Pro 3-in-1 Wireless</td>
                        <td>RM159.00</td>
                        <td>1</td>
                        <td>RM159.00</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <tr><td colspan="5" class="text-center text-muted">No products added to this order</td></tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Grand Total</th>
                        <th>RM159.00</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <a href="orders.php" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left me-1"></i>Back to Orders</a>
    </div>
</div>
<?php 
$content = ob_get_clean(); 
require_once 'layout.php'; 
?>