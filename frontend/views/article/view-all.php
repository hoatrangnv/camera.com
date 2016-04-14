<?= $this->render('//modules/breadcrumbs') ?>
<?= $this->render('//article/list-view', [
    'title' => 'Tin tức',
    'articles' => $articles
]) ?>
<?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>