<?php
/* @var $this View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?> 
    <?php require_once 'meta.php'; ?>
    <script type="text/javascript" language="javascript">
    </script>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="global-container" id="global-container">
        <header class="header">
            <a class="main-logo" href="<?= Url::home() ?>">
                <?= Yii::$app->name ?>
            </a>
            <?php require_once 'top_menu.php'; ?>
            <div class="clr"></div>
        </header>
        <div class="main-container">
            <?php // require_once 'side_menu.php'; ?>
            <div class="content">
                <?= $content ?>
            </div>
            <div class="clr"></div>
        </div>
        <footer class="footer">
            <p>
                Copyright © <?= date('Y') ?> <strong><?= Yii::$app->name ?></strong>
            </p>
            <div class="clr"></div>
        </footer>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
