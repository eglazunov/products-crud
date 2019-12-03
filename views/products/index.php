<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site</title>

    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php include(__DIR__.'/../layouts/header.php') ?>
        
        <div class="row">
            <div class="col-md-12">
                <a href="/products/create" class="btn btn-success">Create a new</a>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th class="col-md-2">Title</th>
                <th class="col-md-8">Price</th>
                <th class="col-md-2">Control</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($products as $product): ?>
                <tr>
                    <td><?php echo $product->title ?></td>
                    <td>$<?php echo $product->price ?></td>
                    <td>
                        <a href="<?php echo "/products/{$product->id}/edit" ?>" class="btn btn-sm btn-default">
                            Edit
                        </a>
                        <button class="btn btn-sm  btn-danger">
                            Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="/static/js/jquery3.4.1.js"></script>
    <script src="/static/js/bootstrap.js"></script>
</body>
</html>