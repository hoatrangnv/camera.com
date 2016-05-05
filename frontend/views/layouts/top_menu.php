<?php

use yii\helpers\Url;

?>
<nav class="top-menu">
    <ul>
        <li id="toggle-bt">
            <a href="javascript:void(0)" title="Danh mục sản phẩm">
                <button class="toggle-bt">
                    <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                    </svg>
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
