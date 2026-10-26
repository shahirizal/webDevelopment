<?php 
ob_start(); 
?>

<!-- Welcome Banner -->
<div class="card shadow border-0 border-start border-5 mb-4" style="background-color: #bae6fd; border-color: #0ea5e9 !important;">
    <div class="card-body p-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-6 fw-bold mb-2 text-dark">NexusDock Management Dashboard</h1>
                <p class="lead text-muted mb-0">Welcome to your central enterprise hub for multi-device charging docks, power accessories, and order tracking.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <i class="bi bi-cpu display-1" style="color: #0ea5e9;"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stat Cards (Sebelah-Menyebelah / 4 Kolum Sebaris) -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0 text-dark" style="background-color: #e0f2fe;">
            <div class="card-body d-flex align-items-center justify-content-between p-3">
                <div>
                    <h6 class="text-uppercase mb-1 text-secondary small fw-semibold">Products</h6>
                    <h3 class="mb-0 fw-bold">20</h3>
                </div>
                <i class="bi bi-box-seam fs-1 opacity-75" style="color: #0ea5e9;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm border-0 text-dark" style="background-color: #bae6fd;">
            <div class="card-body d-flex align-items-center justify-content-between p-3">
                <div>
                    <h6 class="text-uppercase mb-1 text-secondary small fw-semibold">Orders</h6>
                    <h3 class="mb-0 fw-bold">12</h3>
                </div>
                <i class="bi bi-cart-check-fill fs-1 opacity-75" style="color: #0284c7;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm border-0 text-dark" style="background-color: #e0f2fe;">
            <div class="card-body d-flex align-items-center justify-content-between p-3">
                <div>
                    <h6 class="text-uppercase mb-1 text-secondary small fw-semibold">Customers</h6>
                    <h3 class="mb-0 fw-bold">45</h3>
                </div>
                <i class="bi bi-people-fill fs-1 opacity-75" style="color: #0ea5e9;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm border-0 text-dark" style="background-color: #bae6fd;">
            <div class="card-body d-flex align-items-center justify-content-between p-3">
                <div>
                    <h6 class="text-uppercase mb-1 text-secondary small fw-semibold">Staffs</h6>
                    <h3 class="mb-0 fw-bold">8</h3>
                </div>
                <i class="bi bi-person-badge-fill fs-1 opacity-75" style="color: #0284c7;"></i>
            </div>
        </div>
    </div>
</div>

<!-- Carousel Section -->
<div class="card shadow-sm mb-4 bg-white border-0">
    <div class="card-body">
        <h5 class="mb-3" style="color: #0ea5e9;"><i class="bi bi-stars me-2"></i>Featured Ecosystem Collection</h5>
        <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner rounded">
                <div class="carousel-item active p-5 text-center text-dark" style="background-color: #bae6fd;">
                    <i class="bi bi-lightning-charge display-3 mb-3" style="color: #0ea5e9;"></i>
                    <h3 class="fw-bold">Multi-Device Wireless Docks</h3>
                    <p class="text-secondary">Simultaneous fast-charging solutions designed for smartphones, smartwatches, and wireless earbuds.</p>
                </div>
                <div class="carousel-item p-5 text-center text-dark" style="background-color: #bae6fd;">
                    <i class="bi bi-plug display-3 mb-3" style="color: #0284c7;"></i>
                    <h3 class="fw-bold">High-Output GaN Adapters</h3>
                    <p class="text-secondary">Compact, high-efficiency power adapters engineered for heavy-duty professional laptops and devices.</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require_once 'layout.php'; 
?>