<?php

echo $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 300,
        'time_out' => 3000,
        'auto_run' => true,
        'pause_on_hover' => true
    ]
]);

//echo $this->render('//product/list-view', [
//    'title' => 'Sản phẩm b&#225;n chạy',
//    'products' => $best_seller_products,
//]);

foreach ($hot_product_categories as $cate) {
    echo $this->render('//product/list-view', [
        'title' => $cate->name,
        'products' => $cate->getProducts(['limit' => 6]),
    ]);
}