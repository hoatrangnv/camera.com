<section class="bg-gray">
    <div class="main">
        <div class="breadcrumb">
        <?php
        $i = count($this->context->breadcrumbs);
        foreach ($this->context->breadcrumbs as $item) {
            if (--$i > 0) {
        ?>    <a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a> »
        <?php
            } else {
        ?>    <a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>" class="last"><?= $item['label'] ?></a>
        <?php
            }
        }
        ?></div>
    </div>
</section>