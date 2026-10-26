<?php 
ob_start(); 
?>
<div class="card shadow border-0 border-start border-5 mb-4" style="background-color: #bae6fd; border-color: #0ea5e9 !important;">
    <div class="card-body">
        <h2 class="mb-1 text-dark">Customers</h2>
        <p class="text-muted mb-0">Manage and track all your NexusDock customers</p>
    </div>
</div>

<div class="card shadow-sm mb-4 bg-white border-0">
    <div class="card-body">
        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0 text-dark">
                    <i class="bi bi-pencil-square me-2" style="color: #0ea5e9;"></i>
                    Customer Form
                </h5>
                <small class="text-muted">Fill in the details of a customer</small>
            </div>
            <div class="col-auto">
                <span class="badge text-white" style="background-color: #0ea5e9;">* Required fields</span>
            </div>
        </div>
        
        <hr>
        
        <form action="" method="post" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="customer_num" class="form-label">Customer ID <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="customer_num" id="customer_num" type="text" class="form-control" placeholder="Enter Customer ID" value="" required>
                </div>
                <div class="col-md-4">
                    <label for="customer_name" class="form-label">Name <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="customer_name" id="customer_name" type="text" class="form-control" placeholder="Enter Customer Name" value="" required>
                </div>
                <div class="col-md-4">
                    <label for="customer_gender" class="form-label">Gender <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="customer_gender" id="customer_gender" class="form-select" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="customer_phone" class="form-label">Phone Number <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="customer_phone" id="customer_phone" type="text" class="form-control" placeholder="Enter Phone Number" value="" required>
                </div>
                <div class="col-md-6">
                    <label for="register_date" class="form-label">Register Date <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="register_date" id="register_date" type="date" class="form-control" value="" required>
                </div>
            </div>
            
            <hr class="mt-4 mb-3">
            
            <div>
                <button type="submit" name="create" class="btn text-white" style="background-color: #0ea5e9;">
                    <i class="bi bi-save me-1"></i>Create
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
                    Customer List
                </h5>
                <small class="text-muted">View and manage all registered customers</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-success">Total: 1 items</span>
            </div>
        </div>
        
        <hr>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead style="background-color: #0ea5e9; color: #ffffff;">
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Register Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>C001</td>
                        <td>Alice Johnson</td>
                        <td>Female</td>
                        <td>012-3456789</td>
                        <td>2026-10-03</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean(); 
require_once 'layout.php'; 
?>