<!doctype html>
<html lang="en">
    <?php include(__DIR__.'/../layouts/head.php') ?>
    <body>
        <div class="container">
            <?php include(__DIR__.'/../layouts/header.php') ?>

            <form action="/products/<?php echo $product->id ?>" method="POST">
                <input name="_method" type="hidden" value="PUT">
                <?php include(__DIR__.'/../products/form.php') ?>
            </form>
        </div>

        <?php include(__DIR__.'/../layouts/scripts.php') ?>
    </body>
</html>