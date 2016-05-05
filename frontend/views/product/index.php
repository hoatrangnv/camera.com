<?= $this->render('//modules/breadcrumbs') ?>
<div class="col-7">
<?= $this->render('//modules/slideshow', [
    'data' => $images,
    'options' => [
        'auto_run' => false,
        'time_slide' => 300,
        'time_out' => 3000,
        'pause_on_hover' => true,
    ]
]) ?>
</div>
<div class="col-5 paragraph">
    <h2><?= $product->name ?></h2>
    <p><?= $product->description ?></p>
    <?php
    if ($product->original_price > $product->price) {
    ?>
    <p>Giá gốc: <span class="o-price"><?= $product->currency('original_price') ?></span></p>
    <?php
    }
    ?>
    <p>Giá bán: <span class="price"><?= $product->currency('price') ?></span></p>
</div>
<div class="col-12 paragraph">
    <h3>Giới thiệu</h3>
    <?= $product->long_description ?>
</div>
<div class="col-12 paragraph">
    <h3>Thông số kỹ thuật</h3>
    <?= $product->details ?>
</div>