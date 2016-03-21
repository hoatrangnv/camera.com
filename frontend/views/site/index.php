<?php

?>
<div class="col-md-10">
    <div id="slideArea">
        <div class="slide-images">
        <?php
        $i = 0;
        foreach ($slideshow_items as $item) {
        ?>
            <div class="one-image-wrapper">
                <img src="<?= $item->getImage($slideshow_item_image_suffix) ?>" title="<?= $item->caption ?>" alt="<?= $item->caption ?>">
            </div>
        <?php
        $i++;
        }
        ?>
        </div>
        <div class="slide-buttons">
            <div id="prevBt"><i class="slide-bt prev"></i></div>
            <div id="nextBt"><i class="slide-bt next"></i></div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php
$this->registerCss('
#slideArea {
    overflow:hidden;
}
#slideArea .slide-images {
    wordwrap: no-break;
}
#slideArea .one-image-wrapper {
    position:relative;
    float:left
}
');