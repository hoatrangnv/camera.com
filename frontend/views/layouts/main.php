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
    var gs = document.getElementsByClassName("paragraph");
    for (var i = 0; i < gs.length; i++) {
        var g = gs[i];
        if (typeof(g) !== "undefined" && g !== null) {
            var es = g.querySelectorAll("*");
            for (var j = 0; j < es.length; j++) {
                setStyle(es[j]);
            }
            function setStyle(e) {
                var e_w, p, p_w;
                p = e.parentElement;
                p_w = parseInt(window.getComputedStyle(p, null).getPropertyValue("width"));
                e_w = parseInt(window.getComputedStyle(e, null).getPropertyValue("width"));
                e.style.maxWidth = "initial";
                e.style.maxHeight = "initial";
                e.style.minWidth = "initial";
                e.style.minHeight = "initial";
                if (e_w > p_w) {
                    e.style.paddingRight = "0px";
                    e.style.paddingLeft = "0px";
                    e.style.boxSizing = "border-box";
                    e.style.height = "auto";
                    e.style.width = p_w + "px";
                }
            }
        }
    }
    </script>
    <?php require_once 'plugins.php'; ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
