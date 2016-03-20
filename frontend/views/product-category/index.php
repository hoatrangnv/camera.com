<?= $this->render('//modules/breadcrumbs') ?>
<section class="content">
    <div class="main">
        <div class="col2 clearfix">
            <div class="col-l">
                <div class="clearfix tile-pagecate">
                    <h2 class="fl title"><span class="ic-flower"></span><strong><?= $cate->name ?></strong></h2>
                    <?= $this->render('//modules/like_share', ['model' => $cate, 'class' => 'fr']) ?>
                </div>
                <ul class="list-unstyle list-news">
                    <?php foreach ($products as $item) {
                        $item->getImage('--220x220');
                        ?>
                    <li>
                        <h2 class="title-news"><?= $item->astrong() ?></h2>
                        <div class="clearfix">
                            <?= $item->a('image fl', $item->img()) ?>
                            <div class="magl">
                                <p class="clearfix info-post">
                                    <time class="fl"><em class="ic-lock"></em><?= $item->date() ?></time>
                                    <span class="fl comment"><em class="ic-comment"></em><?= $item->comment_count ?> bình luận</span>
                                    <span class="fl views"><em class="ic-views"></em><?= $item->view_count ?> xem</span>
                                </p>
                                <p class="desc">
                                    <?= $item->summary() ?>
                                </p>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>
            </div>
            <?= $this->render('//layouts/right') ?>
        </div>
    </div>
</section>