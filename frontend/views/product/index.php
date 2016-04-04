<?= $this->render('//modules/breadcrumbs') ?>
<div class="col-6">
<?= $this->render('//modules/slideshow', [
    'data' => $images,
    'options' => [
        'auto_run' => false,
        'time_slide' => 300,
//        'time_out' => 3000
//        'pause_on_hover' => true,
    ]
]) ?>
</div>