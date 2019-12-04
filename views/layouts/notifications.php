<?php if(isset($_SESSION['errors'])): ?>
    <section class="notifications">
        <div class="alert alert-danger alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            <ul>
                <?php foreach($_SESSION['errors'] as $errors): ?>
                    <li><?php echo $errors[0] ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <?php unset($_SESSION['errors']); ?>

<?php elseif(isset($_SESSION['success'])): ?>
    <section class="notifications">
        <div class="alert alert-success alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $_SESSION['success'] ?>
        </div>
    </section>

    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
