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
        <div id="wrapper">
                <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?= $content ?>
        </div>
    </div>
        <div class="clearfix"></div>
    </div>
    <footer class="footer">
            <div class="panel panel-footer">
                <p class="pull-left">Copyright © <?= date('Y') ?> <strong><?= Yii::$app->name ?></strong></p>
                <div class="clearfix"></div>
            </div>
    </footer>
        <?php
        $this->registerJs('
    <!-- Menu Toggle Script -->
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    ');
        ?>
    <?php // require_once 'plugins.php';  ?>
</div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
