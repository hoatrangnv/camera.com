<?php
/* @var $this View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?> 
    <?php require_once 'meta.php'; ?>
    <script type="text/javascript" language="javascript">
    </script>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="container" style="padding:0;max-width:1000px">
    <div class="wrap">
            <?php require_once 'header.php'; ?>
            <?= $content ?>
    </div>
    <footer class="footer">
            <div class="panel panel-footer">
                <p class="pull-left">Copyright © <?= date('Y') ?> <strong><?= Yii::$app->name ?></strong></p>
                <div class="clearfix"></div>
            </div>
    </footer>
    <?php // require_once 'plugins.php';  ?>
</div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
