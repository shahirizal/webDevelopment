<?php 
ob_start(); 
$grandTotal = 0;
?>
<div class="card shadow border-0 border-start border-5 mb-4" style="background-color: #ffffff; border-color: #0ea5e9 !important;">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-1 text-dark">Invoice</h2>
                <p class="text-muted mb-0">Order #<?= htmlspecialchars($order['fld_order_num'] ?? '') ?></p>
            </div>
            <div class="col-auto">
                <button type="button" onclick="window.print()" class="btn text-white" style="background-color: #0ea5e9;"><i class="bi bi-printer me-1"></i>Print</button>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm bg-white border-0">
    <div class="card-body p-4">
        <div class="row mb-4">
            <div class="col-md-6">
                <h4 class="text-dark fw-bold">NexusDock</h4>
                <p class="text-muted mb-0">Sales Invoice</p>
            </div>
            <div class="col-md-6 text-md-end">
                <strong>Invoice No.: </strong><?= htmlspecialchars($order['fld_order_num'] ?? '') ?><br>
                <strong>Date: </strong><?= htmlspecialchars($order['fld_order_date'] ?? '') ?>
            </div>
        </div>
        
        <hr>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Customer</strong><br>
                <?= htmlspecialchars($order['fld_customer_name'] ?? $order['fld_customer_num'] ?? '') ?><br>
                <small class="text-muted"><?= htmlspecialchars($order['fld_customer_phone'] ?? '') ?></small>
            </div>
            <div class="col-md-6 text-md-end">
                <strong>Staff</strong><br>
                <?= htmlspecialchars($order['fld_staff_name'] ?? $order['fld_staff_num'] ?? '') ?><br>
                <small class="text-muted"><?= htmlspecialchars($order['fld_staff_email'] ?? '') ?></small>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($details)): ?>
                        <?php foreach ($details as $index => $detail): ?>
                            <?php
                            $unitPrice = (float)($detail['fld_product_price'] ?? 0);
                            $qty = (int)($detail['fld_order_detail_quantity'] ?? 0);
                            $amount = $unitPrice * $qty;
                            $grandTotal += $amount;
                            ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($detail['fld_product_name'] ?? $detail['fld_product_num']) ?></td>
                                <td>RM<?= number_format($unitPrice, 2) ?></td>
                                <td><?= htmlspecialchars((string)$qty) ?></td>
                                <td class="text-end">RM<?= number_format($amount, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">No items found for this order</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Grand Total</th>
                        <th class="text-end">RM<?= number_format($grandTotal, 2) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <a href="<?= BASE_URL ?>orderdetailcontroller/index/<?= htmlspecialchars($order['fld_order_num'] ?? '') ?>" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left me-1"></i>Back to Details</a>
    </div>
</div>

<style>
@media print {
    #mySidebar, #myBurger, .btn {
        display: none !important;
    }
    .card {
        border: none !important;
        box-shadow: none !important;
        background-color: transparent !important;
    }
}
</style>

<?php 
$content = ob_get_clean(); 
require_once 'layout.php'; 
?>