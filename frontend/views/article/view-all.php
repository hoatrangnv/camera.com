<?= $this->render('//modules/breadcrumbs') ?>
<section class="list-view">
    <h1 class="title">Tin tức</h1>
    <div class="list">
        <?php
        foreach ($articles as $item) {
        ?>
        <a class="detail" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
            <div class="img-wrap">
                <img src="<?= $item->getImage() ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </div>
            <h3 class="name"><?= $item->name ?></h3>
            <p class="desc"><?= $item->description ?></p>
            <div class="clr"></div>
        </a>
        <?php
        }
        ?>
    </div>
</section>
<?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>