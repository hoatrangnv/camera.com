<?php

use yii\helpers\Url;

?>
<nav class="top-menu">
    <ul>
        <li id="toggle-bt">
            <a href="javascript:void(0)" title="Danh mục sản phẩm">
                <button class="toggle-bt">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="toggle-bt-name">
                    Danh mục sản phẩm
                </span>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['article/view-all']) ?>" title="Tin tức">Tin tức</a>
        </li>
        <li class="more">
            <a href="" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a>
        </li>
        <li class="more">
            <a href="" title="Liên hệ">Liên hệ</a>
        </li>
        <li class="more">
            <a href="" title="Về chúng tôi">Về chúng tôi</a>
        </li>
    </ul>
    <div class="clr"></div>
</nav>
