<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Guestbook</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4 p-md-5 text-center">
            <h1 class="h3 card-title mb-4">My Guestbook</h1>
            <p class="text-secondary mb-2">Date: <?= date("d-m-Y", time()); ?></p>
            <p class="text-secondary mb-4">Time: <?= date("H:i", time()); ?></p>
            <div>
              <a class="btn btn-primary me-2" href="form.php">Add</a>
              <a class="btn btn-outline-primary" href="list.php">List</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>