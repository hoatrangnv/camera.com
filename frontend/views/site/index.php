<?= $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 300,
        'time_out' => 3000,
        'auto_run' => true,
        'pause_on_hover' => true
    ]
]) ?>
<?= $this->render('//product/list-view', [
    'title' => 'Sản phẩm bán chạy',
    'products' => $best_seller_products,
]) ?>