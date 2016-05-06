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
    <h2 class="title-1"><?= $product->name ?></h2>
    <?= $product->description ?>
    <?php
    if ($product->original_price > $product->price) {
    ?>
    <p style="margin-top:0.5em">Giá niêm yết: <span class="o-price"><?= $product->currency('original_price') ?></span></p>
    <p style="margin-top:0.5em">Giá khuyến mãi: <span class="price"><?= $product->currency('price') ?></span></p>
    <p style="margin-top:0.5em;color:#689f38;font-style:italic;font-weight:bold">
        <svg style="display:inline;float:left" fill="#689f38" height="1.25em" viewBox="0 0 24 24" width="1.25em" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
        </svg>
        Tiết kiệm: <?= common\models\I18n::currency($product->original_price - $product->price) ?> (<?= number_format(100 * ($product->original_price - $product->price) / $product->original_price, 1, ',', '.') ?>%)</p>
    <?php
    } else {
    ?>
    <p style="margin-top:0.5em">Giá bán: <span class="price"><?= $product->currency('price') ?></span></p>
    <?php
    }
    ?>
</div>
<div class="col-12 paragraph">
    <h3 class="sub-title-1">Giới thiệu</h3>
    <?= $product->long_description ?>
</div>
<div class="col-12 paragraph">
    <h3 class="sub-title-1">Thông số kỹ thuật</h3>
    <?= $product->details ?>
</div>