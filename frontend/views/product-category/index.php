<?= $this->render('//modules/breadcrumbs') ?>
<?= $this->render('//product/list-view', [
    'title' => $cate->name,
    'products' => $products,
]) ?>
<?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>
<div class="col-12 paragraph">
    <?= $cate->long_description ?>
</div>