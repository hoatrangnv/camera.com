<div class="breadcrumbs">
<?php
    foreach ($this->context->breadcrumbs as $item) {
?>
    <a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a>
<?php
    }
?>
</div>