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
    <div class="global-container">
    <h1 class="top-title"><?= $this->context->h1 ?></h1>
    <header class="header">
        <a class="main-logo" href="<?= Url::home() ?>" title="<?= Yii::$app->name ?>">
            <!--<b style="padding:0 0.5em"><span style="color:#ef9000;font-size:1.5em;font-family:tahoma">CameraQuanSat</span><i style="color:#17bcf1;font-size:1.35em;font-family:arial">.me</i></b>-->
        </a>
        <?php require_once 'top_menu.php'; ?>
        <div class="clr"></div>
    </header>
    <div class="main-container">
        <?php require_once 'side_menu.php'; ?>
        <div class="content">
            <?= $content ?>
        </div>
        <div class="clr"></div>
    </div>
    <footer class="footer">
        <p>
            Copyright &copy; <?= date('Y') ?> <strong><?= Yii::$app->name ?></strong>
        </p>
        <div class="clr"></div>
    </footer>
    </div>
    <script>
    <?php $this->beginBlock('JS_END') ?>
    var g;
    var gs = document.getElementsByClassName("paragraph");
    for (var k = 0; k < gs.length; k++) {
        g = gs[k];
        if (typeof(g) !== "undefined" && g !== null) {
            var g_w = parseInt(window.getComputedStyle(g, null).getPropertyValue("width"));
            var els = g.querySelectorAll("table, img, iframe");
            for (var i = 0; i < els.length; i++) {
                setStyle(els[i]);
            }
            function setStyle(el) {
                el_w = parseInt(window.getComputedStyle(el, null).getPropertyValue("width"));
                if (el_w > g_w) {
                    el.style.paddingRight = "0px";
                    el.style.paddingLeft = "0px";
                    el.style.boxSizing = "border-box";
                    el.style.height = "auto";
                    el.style.width = g_w + "px";
                }
            }
        }
    }
    <?php $this->endBlock(); ?>
    </script>
    <?php $this->registerJs($this->blocks['JS_END'], $this::POS_END, 'JS_END'); ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
