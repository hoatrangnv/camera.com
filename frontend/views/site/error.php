<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
<section class="content">
    <div class="main">
        <h1>:((</h1>
        <h2><?= nl2br(Html::encode($message)) ?></h2>
    </div>
</section>
</div>
<?php
$this->registerCss('
footer {
    bottom: 0;
    position: absolute;
    width: 100%;
}
.site-error {
    background-image: url("' . Yii::$app->params['images_url'] . '/Page-Not-Found.jpg");
}
.site-error .main {
    padding: 2em 0;
}
.site-error h1 {
    color: blue;
}
.site-error h2 {
    margin-top: 1em;
}
');
