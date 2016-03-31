<?php

use frontend\models\Menu;

$menu = Menu::getData();
$current_id = Menu::getCurrentId();
?>
<nav class="side-menu" id="side-menu">
    <ul>
        <?php
        foreach (array_slice($menu, 1, null, true) as $id => $item) { // Loại bỏ "Trang chủ" khi hiển thị ra
            $active = in_array($current_id, array_merge([$id], array_keys($item['children'])));
        ?>
        <li <?= $active ? 'class="active"' : '' ?>>
            <a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a>
            <?php
            if ($item['children'] !== []) {
            ?>
            <?php
            if ($item['children'] !== []) {
            ?>
            <button class="sub-bt">&#94;</button>
            <?php
            }
            ?>
            <ul <?= $active ? 'class="open"' : '' ?>>
                <?php
                foreach ($item['children'] as $c_id => $c_item) {
                ?>
                <li <?= $current_id === $c_id ? 'class="active"' : '' ?>>
                    <a href="<?= $c_item['url'] ?>" title="<?= $c_item['label'] ?>"><?= $c_item['label'] ?></a>
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


var bts = document.getElementsByClassName("sub-bt");
for (var i = 0; i < bts.length; i++) {
    var smc = bts[i].nextElementSibling.classList;
    bts[i].addEventListener("click", function(){
        if (smc.contains("open")) {
            smc.remove("open");
        } else {
            smc.add("open");
        }
    });
}
</script>
