<section class="row list-view">
    <h2 class="title"><?= $title ?></h2>
    <div class="list">
        <?php
        foreach ($products as $item) {
        ?>
        <a class="thumb" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
            <div class="img-wrap">
                <img src="<?= $item->getImage('--200x200') ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </div>
            <div class="desc">
                <h3 class="name"><?= $item->name ?></h3>
                <?= $item->description ?>
                <?php
                if ($item->original_price > $item->price) {
                ?>
                <p class="o-price"><?= $item->currency('original_price') ?></p>
                <?php
                }
                ?>
                <p class="price"><?= $item->currency('price') ?></p>
            </div>
            <?php
            if ($item->original_price > $item->price || $item->is_hot == 1) {
            ?>
            <div class="tip">
            <?php
            if ($item->original_price > $item->price) {
            ?>
                <img src="<?= Yii::$app->params['images_url'] ?>/khuyenmai2.gif" alt="Khuyến mãi">
            <?php
            }
            ?>
            <?php
            if ($item->is_hot == 1) {
            ?>
                <img src="<?= Yii::$app->params['images_url'] ?>/hot1.gif" alt="Hot">
            <?php
            }
            ?>
            </div>
            <?php
            }
            ?>
            <div class="clr"></div>
        </a>
        <?php
        }
        ?>
    </div>
</section>