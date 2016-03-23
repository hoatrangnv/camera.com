
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
      <?php
      for ($i = 0; $i < count($slideshow_items); $i++) {
      ?>
    <li data-target="#myCarousel" data-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active"' : '' ?>></li>
    <?php
      }
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?php
        foreach ($slideshow_items as $i => $item) {
        ?>
    <div class="item <?= $i === 0 ? 'active' : '' ?>">
      <img src="<?= $item->getImage($slideshow_item_image_suffix) ?>" title="<?= $item->caption ?>" alt="<?= $item->caption ?>">
      <div class="carousel-caption">
          <h3><?= $item->caption ?></h3>
      </div>
    </div>
    <?php
        }
        ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?= $this->render('//layouts/left') ?>
<?php

$this->registerCss('
#myCarousel img {width:100%}
');
