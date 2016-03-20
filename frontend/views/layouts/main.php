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
<html lang="vi">
<head>
<?php require_once 'meta.php'; ?>
<?= Html::csrfMetaTags() ?> 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script type="text/javascript" language="javascript">
function showmenu(div_id){
    if (document.getElementById(div_id).style.display == 'block') {
        document.getElementById(div_id).style.display = 'none';
    } else {
        document.getElementById(div_id).style.display = 'block';
    }
}
</script>
<?php $this->head() ?>

</head>

<body>
<?php $this->beginBody() ?>
<div class="globalContainer">
<?php require_once 'header.php'; ?>
<!--<div id="pageContent">-->
<?= $content ?>
<!--</div>-->
</div>
<?php require_once 'footer.php'; ?>
<?php require_once 'plugins.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
