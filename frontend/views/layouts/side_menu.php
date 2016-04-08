<?php

use frontend\models\Menu;
use frontend\models\ProductCategory;
use yii\helpers\Url;

$data = [];
$productCategories = ProductCategory::getProductCategories(['orderBy' => 'position asc, is_hot desc']);
foreach ($productCategories as $item) {
    $data[$item->id] = [
        'label' => $item->name,
        'url' => $item->getLink(),
        'parent_key' => $item->parent_id
    ];
}
Menu::init([
//    'Home' => [
//      [
//          'label' => 'Trang chủ',
//          'url' => Url::home(true),
//          'parent_key' => null
//      ]  
//    ],
    'ProductCategory' => $data,
]);

$menu = Menu::getTopParents();

?>
<nav class="side-menu" id="side-menu">
    <ul>
        <?php
        foreach ($menu as $key => $item) {
        ?>
        <li <?= $item->isCurrent() ? 'class="active"' : '' ?>>
            <?= $item->a() ?>
            <?php
            if ($item->getChildren() !== []) {
            ?>
            <button class="sub-bt <?= $item->isCurrent() ? 'open' : '' ?>"></button>
            <ul>
                <?php
                foreach ($item->getChildren() as $c_key => $c_item) {
                ?>
                <li <?= $c_item->isCurrent() ? 'class="active"' : '' ?>>
                    <?= $c_item->a() ?>
                </li>
                <?php
                }
                ?>
            </ul>
            <?php
            }
            ?>
        </li>
        <?php
        }
        ?>
    </ul>
</nav>

<script>
// toggle side menu
var bt = document.getElementById("toggle-bt");
var body = document.getElementsByTagName("body")[0];
bt.addEventListener("click", function() {
//    if (window.getComputedStyle(nav, null).getPropertyValue("position") === "fixed") {
//    }
    if (!body.classList.contains("toggle")) {
        body.classList.add("toggle");
    } else {
        body.classList.remove("toggle");
    }
});

var ic_arrow_right = "<svg fill=\"#666\" height=\"24\" viewBox=\"0 0 24 24\" width=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z\"/><path d=\"M0-.25h24v24H0z\" fill=\"none\"/></svg>";
var ic_arrow_down = "<svg fill=\"#666\" height=\"24\" viewBox=\"0 0 24 24\" width=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z\"/><path d=\"M0-.75h24v24H0z\" fill=\"none\"/></svg>";
var bts = document.getElementsByClassName("sub-bt");
for (var i = 0; i < bts.length; i++) {
    if (bts[i].classList.contains("open")) {
        bts[i].innerHTML = ic_arrow_down;
    } else {
        bts[i].innerHTML = ic_arrow_right;
    }
    bts[i].addEventListener("click", function(){
        if (this.classList.contains("open")) {
            this.classList.remove("open");
            this.innerHTML = ic_arrow_right;
        } else {
            this.classList.add("open");
            this.innerHTML = ic_arrow_down;
        }
    });
}
</script>
