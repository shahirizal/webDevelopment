<?php 
ob_start(); 
?>
<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Welcome to NexusDock</h2>
        <p class="text-muted mb-0">Your ultimate modern charging dock and gadget ecosystem</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center p-4">
                <i class="bi bi-box-seam text-primary fs-1 mb-3"></i>
                <h4>Products</h4>
                <p class="text-muted">Explore our latest 3-in-1 wireless chargers, compact pads, and high-power GaN docks.</p>
                <a href="products.php" class="btn btn-outline-primary mt-2">Manage Products</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center p-4">
                <i class="bi bi-people-fill text-primary fs-1 mb-3"></i>
                <h4>Customers</h4>
                <p class="text-muted">View and keep track of all registered customers interacting with NexusDock.</p>
                <a href="customers.php" class="btn btn-outline-primary mt-2">Manage Customers</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center p-4">
                <i class="bi bi-cart-fill text-primary fs-1 mb-3"></i>
                <h4>Orders</h4>
                <p class="text-muted">Monitor daily incoming customer orders, update details, and check invoices.</p>
                <a href="orders.php" class="btn btn-outline-primary mt-2">Manage Orders</a>
            </div>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean(); 
require_once 'layout.php'; 
?>