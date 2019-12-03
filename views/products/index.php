<!doctype html>
<html lang="en">
    <?php include(__DIR__.'/../layouts/head.php') ?>
    <body>
        <div class="container">
            <?php include(__DIR__.'/../layouts/header.php') ?>

            <div class="row">
                <div class="col-md-12">
                    <a href="/products/create" class="btn btn-success">Create new</a>
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

        <?php include(__DIR__.'/../layouts/scripts.php') ?>
    </body>
</html>