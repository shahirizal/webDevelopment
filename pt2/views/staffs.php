<?php 
ob_start(); 
?>
<div class="card shadow border-0 border-start border-5 mb-4" style="background-color: #bae6fd; border-color: #0ea5e9 !important;">
    <div class="card-body">
        <h2 class="mb-1 text-dark">Staffs</h2>
        <p class="text-muted mb-0">Manage and track all your NexusDock staff members</p>
    </div>
</div>

<div class="card shadow-sm mb-4 bg-white border-0">
    <div class="card-body">
        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0 text-dark">
                    <i class="bi bi-pencil-square me-2" style="color: #0ea5e9;"></i>
                    <?php echo isset($astaff) ? 'Edit Staff' : 'Staff Form'; ?>
                </h5>
                <small class="text-muted">Fill in the details of a staff member</small>
            </div>
            <div class="col-auto">
                <span class="badge text-white" style="background-color: #0ea5e9;">* Required fields</span>
            </div>
        </div>
        
        <hr>
        
        <form action="<?= BASE_URL ?>staffcontroller/<?= isset($astaff) ? 'update' : 'save' ?>" method="post" class="needs-validation" novalidate>
            <?php if (isset($astaff)): ?>
                <input type="hidden" name="original_staff_num" value="<?php echo htmlspecialchars($astaff['fld_staff_num']); ?>">
            <?php endif; ?>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="staff_num" class="form-label">Staff ID <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="staff_num" id="staff_num" type="text" class="form-control" placeholder="Enter Staff ID" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_num']) : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="staff_name" class="form-label">Name <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="staff_name" id="staff_name" type="text" class="form-control" placeholder="Enter Staff Name" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_name']) : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="staff_phone" class="form-label">Phone Number <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="staff_phone" id="staff_phone" type="text" class="form-control" placeholder="Enter Phone Number" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_phone']) : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="staff_email" class="form-label">Email Address <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="staff_email" id="staff_email" type="email" class="form-control" placeholder="Enter Email Address" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_email']) : ''; ?>" required>
                </div>
            </div>
            
            <hr class="mt-4 mb-3">
            
            <div>
                <button type="submit" name="<?= isset($astaff) ? 'update' : 'create' ?>" class="btn text-white" style="background-color: #0ea5e9;">
                    <i class="bi bi-save me-1"></i><?= isset($astaff) ? 'Update' : 'Create' ?>
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
                    Staff List
                </h5>
                <small class="text-muted">View and manage all registered staff members</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-success">Total: <?= count($staffs ?? []) ?> items</span>
            </div>
        </div>
        
        <hr>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead style="background-color: #0ea5e9; color: #ffffff;">
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($staffs)): ?>
                        <?php foreach ($staffs as $staff): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($staff['fld_staff_num']); ?></td>
                                <td><?php echo htmlspecialchars($staff['fld_staff_name']); ?></td>
                                <td><?php echo htmlspecialchars($staff['fld_staff_phone']); ?></td>
                                <td><?php echo htmlspecialchars($staff['fld_staff_email']); ?></td>
                                <td>
                                    <a href="<?= BASE_URL; ?>staffcontroller/edit/<?php echo htmlspecialchars($staff['fld_staff_num']); ?>" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?= BASE_URL ?>staffcontroller/delete/<?= htmlspecialchars($staff['fld_staff_num']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No staffs found</td>
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