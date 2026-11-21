<?php 
ob_start(); 
?>
<div class="card shadow border-0 border-start border-5 mb-4" style="background-color: #bae6fd; border-color: #0ea5e9 !important;">
    <div class="card-body">
        <h2 class="mb-1 text-dark">Products</h2>
        <p class="text-muted mb-0">Manage and track all your NexusDock products</p>
    </div>
</div>

<div class="card shadow-sm mb-4 bg-white border-0">
    <div class="card-body">
        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0 text-dark">
                    <i class="bi bi-pencil-square me-2" style="color: #0ea5e9;"></i>
                    <?php echo isset($aproduct) ? 'Edit Product' : 'Product Form'; ?>
                </h5>
                <small class="text-muted">Fill in the details of a charging dock product</small>
            </div>
            <div class="col-auto">
                <span class="badge text-white" style="background-color: #0ea5e9;">* Required fields</span>
            </div>
        </div>
        
        <hr>
        
        <form action="<?= BASE_URL ?>productcontroller/<?= isset($aproduct) ? 'update' : 'save' ?>" method="post" class="needs-validation" novalidate>
            <?php if (isset($aproduct)): ?>
                <input type="hidden" name="original_product_num" value="<?php echo htmlspecialchars($aproduct['fld_product_num']); ?>">
            <?php endif; ?>

            <div class="row g-3">
                <div class="col-md-3">
                    <label for="pid" class="form-label">Product ID <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_num" id="pid" type="text" class="form-control" placeholder="Enter Product ID" value="<?php echo isset($aproduct) ? htmlspecialchars($aproduct['fld_product_num']) : ''; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label">Name <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_name" id="name" type="text" class="form-control" placeholder="Enter Product Name" value="<?php echo isset($aproduct) ? htmlspecialchars($aproduct['fld_product_name']) : ''; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="price" class="form-label">Price (RM) <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_price" id="price" type="number" class="form-control" placeholder="Enter Price" value="<?php echo isset($aproduct) ? htmlspecialchars($aproduct['fld_product_price']) : ''; ?>" required min="0" step="0.01">
                </div>
                <div class="col-md-3">
                    <label for="brand" class="form-label">Brand <span class="text-danger" aria-hidden="true">*</span></label>
                    <?php
                    $brands = ['Anker', 'Baseus', 'Samsung', 'Belkin', 'Ugreen', 'Sony', 'Lisen', 'NexusDock'];
                    $selectedBrand = $aproduct['fld_product_brand'] ?? '';
                    ?>
                    <select name="product_brand" id="brand" class="form-select" required>
                        <option value="">Select Brand</option>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?= htmlspecialchars($brand) ?>" <?= $selectedBrand === $brand ? 'selected' : '' ?>><?= htmlspecialchars($brand) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="product_condition" class="form-label">Condition <span class="text-danger" aria-hidden="true">*</span></label>
                    <?php
                    $conditions = ['New', 'Used'];
                    $selectedCondition = $aproduct['fld_product_condition'] ?? '';
                    ?>
                    <select name="product_condition" id="product_condition" class="form-select" required>
                        <option value="">Select Condition</option>
                        <?php foreach ($conditions as $condition): ?>
                            <option value="<?= htmlspecialchars($condition) ?>" <?= $selectedCondition === $condition ? 'selected' : '' ?>><?= htmlspecialchars($condition) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="product_year" class="form-label">Year <span class="text-danger" aria-hidden="true">*</span></label>
                    <?php
                    $years = [2022, 2023, 2024, 2025, 2026];
                    $selectedYear = (string)($aproduct['fld_product_year'] ?? '');
                    ?>
                    <select name="product_year" id="product_year" class="form-select" required>
                        <option value="">Select Year</option>
                        <?php foreach ($years as $year): ?>
                            <option value="<?= htmlspecialchars((string)$year) ?>" <?= $selectedYear === (string)$year ? 'selected' : '' ?>><?= htmlspecialchars((string)$year) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_quantity" id="quantity" type="number" class="form-control" placeholder="Enter Quantity" value="<?php echo isset($aproduct) ? htmlspecialchars((string)$aproduct['fld_product_quantity']) : ''; ?>" required min="0">
                </div>
                <div class="col-md-3">
                    <label for="product_image" class="form-label">Image</label>
                    <input name="product_image" id="product_image" type="text" class="form-control" placeholder="e.g. dock1.jpg" value="<?php echo isset($aproduct) ? htmlspecialchars($aproduct['fld_product_image'] ?? '') : ''; ?>">
                </div>
            </div>
            
            <hr class="mt-4 mb-3">
            
            <div>
                <button type="submit" name="<?= isset($aproduct) ? 'update' : 'create' ?>" class="btn text-white" style="background-color: #0ea5e9;">
                    <i class="bi bi-save me-1"></i><?= isset($aproduct) ? 'Update' : 'Create' ?>
                </button>
                <button type="reset" class="btn btn-secondary">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Clear
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm bg-white border-0">
    <div class="card-body">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0 text-dark">
                    <i class="bi bi-table me-2" style="color: #0ea5e9;"></i>
                    Product List
                </h5>
                <small class="text-muted">View and manage all products in the inventory</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-success">Total: <?= count($products ?? []) ?> items</span>
            </div>
        </div>
        
        <hr>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead style="background-color: #0ea5e9; color: #ffffff;">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['fld_product_num']); ?></td>
                                <td><?php echo htmlspecialchars($product['fld_product_name']); ?></td>
                                <td>RM<?php echo number_format((float)$product['fld_product_price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($product['fld_product_brand']); ?></td>
                                <td>
                                    <a href="<?= BASE_URL; ?>productcontroller/edit/<?php echo htmlspecialchars($product['fld_product_num']); ?>" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <?php if (!empty($product['fld_product_image'])): ?>
                                        <a href="<?= BASE_URL ?>images/<?= htmlspecialchars($product['fld_product_image']) ?>" target="_blank" class="btn btn-sm text-white" style="background-color: #0ea5e9;" title="View image">
                                            <i class="bi bi-image"></i>
                                        </a>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-sm btn-secondary" disabled title="No image">
                                            <i class="bi bi-image"></i>
                                        </button>
                                    <?php endif; ?>
                                    <a href="<?= BASE_URL ?>productcontroller/delete/<?= htmlspecialchars($product['fld_product_num']) ?>" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure to delete?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No products found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean(); 
require_once 'layout.php'; 
?>