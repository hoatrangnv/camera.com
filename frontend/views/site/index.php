<div class="row">
    <div class="col-md-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-md-9">
        <?=
        $this->render('//modules/carousel', [
            'slideshow_items' => $slideshow_items,
            'slideshow_item_image_suffix' => $slideshow_item_image_suffix
        ])
        ?>
    </div>
</div>