<?php

use frontend\models\Menu;

?>
<?php if (Yii::$app->controller->id != 'site') { ?>
<section class="topseo">
    <div class="main"><h1><strong><?= $this->context->h1 ?></strong></h1></div>
</section>
<?php } ?>
<header>
    <h1 class="txt-logo"><a href="<?= \yii\helpers\Url::home() ?>" title="<?= Yii::$app->params['site_name'] ?>"></a></h1>
</header>
<nav>
    <div class="main">
        <button class="navbar-toggle collapsed" type="button" onClick="showmenu('list-cate')">
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>
        <span class="sr-only">Menu danh mục</span>
        <ul class="list-unstyle clearfix" id="list-cate">
        <?php
        $menu = Menu::getData(Menu::LIMIT);
        $current_id = Menu::getCurrentId();
        foreach ($menu as $id => $item) {
        ?>    <li class="fl <?= $id == $current_id ? 'active' : '' ?>"><a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><strong><?= $item['label'] ?></strong></a></li>
        <?php 
        } 
        ?></ul>
        <div class="search">
            <em class="ic-search" onClick="showmenu('form-search')"></em>
        </div>
        <div class="form-search" id="form-search" style="border:none">
            <gcse:search></gcse:search>
        </div>
        <style>
            .search.relative.clearfix{margin-top:0px;z-index:100;}
            .gsc-input-box,.gsc-search-box,.gsc-control-cse,#___gcse_0,.form-search {border-radius:12px;}
            /*table.gsc-search-box td.gsc-input{padding-right:2px}*/
            .gsc-input-box{border:none;}
            .gsc-search-box-tools .gsc-search-box .gsc-input{padding:1px;}   
            .cse .gsc-control-cse,.gsc-control-cse{padding:0px}
            form.gsc-search-box{margin-bottom:0px;}
            table.gsc-search-box{margin-bottom:0px;}
            .gsc-search-button,.gsc-search-button-v2{display:none}
            .form-search,#___gcse_0{color:#999;height:28px;width:300px;margin-top:0px;float:right;}
            .gsc-control-cse{border:1px solid #eee;height:30px;}
            /*Search Result*/
            .gsc-selected-option-container {min-width: 100px;width: 100px!important}
            .gsc-orderby-container{display:none}
            .gsc-modal-background-image{background:#000}
            .gsc-modal-background-image-visible{opacity:0.5;-ms-filter:"alpha(opacity=50)";filter: alpha(opacity=50)}
            .gsc-results-wrapper-overlay{height:80%;width:75%;top:10%;left:12.5%}
        </style>
    </div>
</nav>