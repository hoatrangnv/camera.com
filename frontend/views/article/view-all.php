<?= $this->render('//modules/breadcrumbs') ?>
<?= $this->render('//article/list-view', [
    'title' => 'Tin tức',
    'articles' => $articles
]) ?>
<div class="clr"></div>
<?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>