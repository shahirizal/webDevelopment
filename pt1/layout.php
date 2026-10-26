<?php require_once 'header.php'; ?>
<?php require_once 'sidebar.php'; ?>
            <div class="col bg-light">
                <!-- Mobile Header with Burger -->
                <div id="myBurger" class="p-3 d-lg-none text-white" style="background-color: #0f172a;">
                    <div class="row">
                        <a href="#" class="text-white text-decoration-none" data-bs-toggle="offcanvas" data-bs-target="#mySidebar">
                            <i class="bi bi-list" style="color: #38bdf8;"></i><h5 class="ms-3 d-inline text-white">NexusDock</h5>
                        </a>
                    </div>
                </div>
                
                <div class="p-4">
                    <?= $content ?? '' ?>
                </div>
            </div>
<?php require_once 'footer.php'; ?>