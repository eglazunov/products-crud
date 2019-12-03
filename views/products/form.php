<div class="row">
    <div class="col-md-12">
        <label>Title*</label>
        <div class="form-group">
            <input type="text" required
                   name="title"
                   class="form-control"
                   value="<?php echo $product->title ?? '' ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label>Price* ($)</label>
        <div class="form-group">
            <input type="number" required
                   step="0.1"
                   name="price"
                   class="form-control"
                   value="<?php echo $product->price ?? '' ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" cols="30" rows="5" class="form-control"
            ><?php echo $product->description ?? '' ?></textarea>
        </div>
    </div>
</div>
<hr>

<?php foreach($attributes as $attribute): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label><?php echo $attribute->title; ?></label>
                <input type="text"
                       class="form-control"
                       name="attributes[<?php echo $attribute->id; ?>][value]"
                       value="">
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">
            Save product
        </button>
    </div>
</div>