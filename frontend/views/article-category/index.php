<?= $this->render('//modules/breadcrumbs') ?>
<?= $this->render('//article/list-view', [
    'title' => $cate->name,
    'articles' => $articles
]) ?>
<?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>