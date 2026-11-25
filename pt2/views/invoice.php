<?php 
ob_start(); 
$grandTotal = 0;
?>
<div class="container my-2 my-md-3">
    <div class="d-flex justify-content-between align-items-center mb-3 no-print">
        <a href="<?= BASE_URL ?>orderdetailcontroller/index/<?= htmlspecialchars((string)($order['fld_order_num'] ?? '')) ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>Back to Order Details
        </a>
        <button type="button" onclick="window.print()" class="btn text-white" style="background-color: #0ea5e9;">
            <i class="bi bi-printer me-1"></i>Print Invoice
        </button>
    </div>

    <div class="card shadow-sm border-0 invoice-card">
        <div class="card-body p-4 p-md-5">
            <div class="row border-bottom pb-4 mb-4 align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold mb-1" style="color: #0ea5e9;">INVOICE</h2>
                    <p class="text-muted mb-0">Order ID: <strong>#<?= htmlspecialchars((string)($order['fld_order_num'] ?? '')) ?></strong></p>
                    <p class="text-muted mb-0">Order Date: <?= htmlspecialchars((string)($order['fld_order_date'] ?? '')) ?></p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <h4 class="fw-bold text-dark mb-1">NexusDock</h4>
                    <p class="text-muted small mb-0">43600 Bangi, Selangor, Malaysia</p>
                    <p class="text-muted small mb-0">Charging Dock &amp; Power Accessories</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="text-uppercase text-muted fw-bold small">Billed To</h6>
                    <p class="mb-1 fw-semibold text-dark"><?= htmlspecialchars((string)($order['fld_customer_name'] ?? '')) ?></p>
                    <p class="text-muted small mb-0">Customer ID: <?= htmlspecialchars((string)($order['fld_customer_num'] ?? '')) ?></p>
                    <?php if (!empty($order['fld_customer_phone'])): ?>
                        <p class="text-muted small mb-0">Phone: <?= htmlspecialchars((string)$order['fld_customer_phone']) ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                    <h6 class="text-uppercase text-muted fw-bold small">Handled By</h6>
                    <p class="mb-1 fw-semibold text-dark"><?= htmlspecialchars((string)($order['fld_staff_name'] ?? '')) ?></p>
                    <p class="text-muted small mb-0">Staff ID: <?= htmlspecialchars((string)($order['fld_staff_num'] ?? '')) ?></p>
                    <?php if (!empty($order['fld_staff_email'])): ?>
                        <p class="text-muted small mb-0">Email: <?= htmlspecialchars((string)$order['fld_staff_email']) ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th>Product</th>
                            <th class="text-end" style="width: 15%;">Unit Price</th>
                            <th class="text-center" style="width: 12%;">Quantity</th>
                            <th class="text-end" style="width: 18%;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($details)): ?>
                            <?php foreach ($details as $index => $detail): ?>
                                <?php
                                $unitPrice = (float)($detail['fld_product_price'] ?? 0);
                                $qty = (int)($detail['fld_order_detail_quantity'] ?? 0);
                                $subtotal = $unitPrice * $qty;
                                $grandTotal += $subtotal;
                                ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars((string)($detail['fld_product_name'] ?? $detail['fld_product_num'] ?? '')) ?></td>
                                    <td class="text-end">RM<?= number_format($unitPrice, 2) ?></td>
                                    <td class="text-center"><?= htmlspecialchars((string)$qty) ?></td>
                                    <td class="text-end">RM<?= number_format($subtotal, 2) ?></td>
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
                            <th colspan="4" class="text-end fs-5">Grand Total</th>
                            <th class="text-end fs-5" style="color: #0ea5e9;">RM<?= number_format($grandTotal, 2) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-center text-muted small mt-4 pt-3 border-top">
                Thank you for your business!
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    #mySidebar, #myBurger, .no-print, .btn {
        display: none !important;
    }
    .col.bg-light, .p-4, .container {
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
        background-color: #ffffff !important;
    }
    .invoice-card {
        border: none !important;
        box-shadow: none !important;
    }
    table thead {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}
</style>

<?php 
$content = ob_get_clean(); 
require_once 'layout.php'; 
?>