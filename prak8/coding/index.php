<?php include('pagination.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagination Modern</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .custom-card {
            margin-top: 50px;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.12);
            background: white;
        }
        .table thead {
            background: #0d6efd;
            color: white;
        }
        .table tbody tr:hover {
            background: #eef5ff;
            transition: 0.2s;
        }
        .pagination-controls a {
            border-radius: 8px;
            text-decoration: none;
        }
        .current-page {
            background: #0d6efd;
            color: white !important;
            border-radius: 8px;
            padding: 6px 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="custom-card">

        <h3 class="text-center mb-4 fw-bold text-primary">
            Data User – Pagination Modern
        </h3>

        <table class="table table-bordered table-hover">
            <thead>
                <th>UserID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Username</th>
            </thead>
            <tbody>
                <?php while ($crow = mysqli_fetch_array($nquery)) { ?>
                    <tr>
                        <td><?= $crow['userid']; ?></td>
                        <td><?= $crow['firstname']; ?></td>
                        <td><?= $crow['lastname']; ?></td>
                        <td><?= $crow['username']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="pagination-controls mt-3 text-center">
            <?= str_replace(
                    ['class="btn btn-default"', 'class="btn btn-default"', '<span class="btn btn-primary">'],
                    ['class="btn btn-outline-primary mx-1"', 'class="btn btn-outline-primary mx-1"', '<span class="current-page">'],
                    $paginationCtrls
            ); ?>
        </div>

    </div>
</div>

</body>
</html>