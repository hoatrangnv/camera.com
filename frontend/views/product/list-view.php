<section class="row list-view">
    <h2 class="title"><?= $title ?></h2>
    <div class="list">
        <?php
        foreach ($products as $item) {
        ?>
        <a class="thumb" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
            <div class="img-wrap">
                <img src="<?= $item->getImage() ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </div>
            <h3 class="name"><?= $item->name ?></h3>
            <p class="desc"><?= $item->description ?></p>
            <?php
            if ($item->original_price > $item->price) {
            ?>
            <p class="o-price"><?= $item->currency('original_price') ?></p>
            <?php
            }
            ?>
            <p class="price"><?= $item->currency('price') ?></p>
            <div class="clr"></div>
        </a>
        <?php
        }
        ?>
    </div>
</section>