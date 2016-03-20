<?php

use frontend\models\Product;
use frontend\models\ProductCategory;

?>
<section class="banner-slide">
    <div class="main">
        <ul class="list-unstyle clearfix">
        <?php foreach(Product::getProducts(['limit' => 3, 'orderBy' => 'is_hot desc, position asc, id desc']) as $item) {
        $item->getImage('--340x340');
        ?>    <li>
                <?= $item->a('img-bn', $item->img()) ?>
                <h2 class="title-bnn"><?= $item->astrong() ?></h2>
            </li>
        <?php 
        }
        ?></ul>
    </div>
</section>
<section class="content">
    <div class="main">
        <div class="col2 clearfix">
            <div class="col-l">
                <ul class="list-unstyle list-news">
                <?php foreach (Product::getProducts(['limit' => 10]) as $item) { 
                $item->getImage('--220x220')
                ?>    <li>
                        <h2 class="title-news"><?= $item->astrong() ?></h2>
                        <div class="clearfix">
                            <?= $item->a('image fl', $item->img()) ?>
                            <div class="magl">
                                <p class="clearfix info-post">
                                    <time class="fl"><em class="ic-lock"></em><?= $item->date() ?></time>
                                    <span class="fl comment"><em class="ic-comment"></em><?= $item->comment_count ?> bình luận</span>
                                    <span class="fl views"><em class="ic-views"></em><?= $item->view_count ?> xem</span></p>
                                <p class="desc"><?= $item->summary() ?></p>
                            </div>
                        </div>
                    </li>
                <?php 
                } 
                ?></ul>
            </div>
            <?= $this->render('//layouts/right') ?>
        </div>
    </div>
</section>