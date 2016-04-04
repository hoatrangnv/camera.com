<?= $this->render('//modules/breadcrumbs') ?>
<div class="col-6">
<?= $this->render('//modules/slideshow', [
    'data' => $images,
    'options' => [
        'auto_run' => false,
        'time_slide' => 300,
//        'time_out' => 3000
//        'pause_on_hover' => true,
    ]
]) ?>
</div>
<div class="col-6">
    <h1><?= $product->name ?></h1>
    <p class="price"><?= $product->currency('price') ?></p>
    <?php
    if ($product->original_price > $product->price) {
    ?>
    <p class="o-price"><?= $product->currency('original_price') ?></p>
    <?php
    }
    ?>
    <p><?= $product->description ?></p>
</div>
<div class="col-12">
    <h2>Mô tả</h2>
    <?= $product->long_description ?>
</div>
<div class="col-12">
    <h2>Chi tiết sản phẩm</h2>
    <?= $product->details ?>
</div>