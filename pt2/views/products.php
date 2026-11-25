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
                    <label for="product_wattage" class="form-label">Max Output <span class="text-danger" aria-hidden="true">*</span></label>
                    <?php
                    $wattages = ['15W', '30W', '65W', '100W', '140W'];
                    $selectedWattage = $aproduct['fld_product_wattage'] ?? '';
                    ?>
                    <select name="product_wattage" id="product_wattage" class="form-select" required>
                        <option value="">Select Wattage</option>
                        <?php foreach ($wattages as $wattage): ?>
                            <option value="<?= htmlspecialchars($wattage) ?>" <?= $selectedWattage === $wattage ? 'selected' : '' ?>><?= htmlspecialchars($wattage) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="product_ports" class="form-label">Charging Slots <span class="text-danger" aria-hidden="true">*</span></label>
                    <?php
                    $portOptions = ['Dual Slot', '2-in-1', '3-in-1', '4-in-1', '5-in-1'];
                    $selectedPorts = $aproduct['fld_product_ports'] ?? '';
                    ?>
                    <select name="product_ports" id="product_ports" class="form-select" required>
                        <option value="">Select Slots</option>
                        <?php foreach ($portOptions as $ports): ?>
                            <option value="<?= htmlspecialchars($ports) ?>" <?= $selectedPorts === $ports ? 'selected' : '' ?>><?= htmlspecialchars($ports) ?></option>
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
            <table class="table table-striped table-hover align-middle">
                <thead style="background-color: #0ea5e9; color: #ffffff;">
                    <tr>
                        <th>Image</th>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Max Output</th>
                        <th>Slots</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($product['fld_product_image'])): ?>
                                        <img src="<?= BASE_URL ?>images/<?= htmlspecialchars($product['fld_product_image']) ?>"
                                             alt="<?= htmlspecialchars($product['fld_product_name']) ?>"
                                             style="width: 56px; height: 56px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';">
                                        <span class="badge bg-light text-muted border" style="display: none; width: 56px; height: 56px; align-items: center; justify-content: center;">No Img</span>
                                    <?php else: ?>
                                        <span class="badge bg-light text-muted border" style="display: inline-flex; width: 56px; height: 56px; align-items: center; justify-content: center;">No Img</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($product['fld_product_num']); ?></td>
                                <td><?php echo htmlspecialchars($product['fld_product_name']); ?></td>
                                <td><?php echo htmlspecialchars($product['fld_product_brand']); ?></td>
                                <td>RM<?php echo number_format((float)$product['fld_product_price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($product['fld_product_wattage'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($product['fld_product_ports'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars((string)($product['fld_product_quantity'] ?? 0)); ?></td>
                                <td class="text-nowrap">
                                    <a href="<?= BASE_URL; ?>productcontroller/edit/<?php echo htmlspecialchars($product['fld_product_num']); ?>" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <?php if (!empty($product['fld_product_image'])): ?>
                                        <a href="<?= BASE_URL ?>images/<?= htmlspecialchars($product['fld_product_image']) ?>" target="_blank" class="btn btn-sm text-white" style="background-color: #0ea5e9;" title="View full image">
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
                            <td colspan="9" class="text-center">No products found</td>
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