<section class="list-view">
    <h1 class="title"><?= $title ?></h1>
    <div class="list">
        <?php
        foreach ($articles as $item) {
        ?>
        <div class="detail">
            <h3 class="name"><a href="<?= $item->getLink() ?>" title="<?= $item->name ?>"><?= $item->name ?></a></h3>
            <a class="img-wrap" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
                <img src="<?= $item->getImage() ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </a>
            <p class="desc"><?= $item->description ?></p>
            <div class="clr"></div>
        </div>
        <?php
        }
        ?>
    </div>
</section>