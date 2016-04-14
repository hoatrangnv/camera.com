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
<div class="col-5">
    <h1><?= $product->name ?></h1>
    <?php
    if ($product->original_price > $product->price) {
    ?>
    <p class="o-price"><?= $product->currency('original_price') ?></p>
    <?php
    }
    ?>
    <p class="price"><?= $product->currency('price') ?></p>
<!--    <p><?= $product->description ?></p>-->
</div>
<div class="col-12">
    <h2>M&#244; tả</h2>
    <?= $product->long_description ?>
</div>
<div class="col-12">
    <h2>Chi tiết sản phẩm</h2>
    <?= $product->details ?>
</div>