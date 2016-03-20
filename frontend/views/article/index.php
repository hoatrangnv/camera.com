<?= $this->render('//modules/breadcrumbs') ?>
<section class="content">
    <div class="main">
        <div class="col2 clearfix">
            <div class="col-l">
                <div class="content-detail">
                    <h2 class="title-detail"><strong><?= $article->name ?></strong></h2>
                    <time>Ngày đăng: <?= $article->date() ?></time>
                    <?= $this->render('//modules/like_share', ['model' => $article]) ?>
                    <div class="content_news">
                        <?= $article->content ?>
                    </div>
                    <div class="news-rela">
                        <h2 class="title"><span class="ic-flower"></span><a title="" href="#"><strong>bài viết cùng chuyên mục</strong></a></h2>
                        <ul class="list-unstyle clearfix">
                            <?php foreach($related_articles as $item) {
                                $item->getImage('--220x220');
                                ?>
                            <li class="clearfix">
                                <?= $item->a('img-bn', $item->img()) ?>
                                <h3><?= $item->astrong() ?></h3>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?= $this->render('//modules/comment', ['model' => $article]) ?>
                </div>

            </div>
            <?= $this->render('//layouts/right') ?>
        </div>
    </div>
</section>
<?php
$this->registerCss('
//.news-rela .img-bn img {
//    height: 100%;
//    width: auto;
//}    
//.news-rela .img-bn {
//    overflow: hidden;
//}    
');
$this->registerJs('
$(".content_news table, .content_news img").each(function(){
    var obj = $(this);
    var obj_parent = obj.parents(".content_news");
    if (obj.width() > obj_parent.width()) {
        obj.width(obj_parent.width() + "px").height("auto");
    }
});
$(".content_news table").css("border-top", "1px solid #ccc").css("border-left", "1px solid #ccc");
$(".content_news table td").css("border-bottom", "1px solid #ccc").css("border-right", "1px solid #ccc");
$(".content_news table td").css("padding", "3px");
');