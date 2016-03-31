<?php

use frontend\models\SlideshowItem;

?>
<div class="slideshow-container" id="slideshow-container">
    <div class="slideshow-images" id="slideshow-images">
        <div class="wrap">
    <?php
    foreach (SlideshowItem::find()->where(['is_active' => 1])->all() as $item) {
    ?><!--
        --><figure>
            <img src="<?= $item->getImage() ?>" title="<?= $item->caption ?>" alt="<?= $item->caption ?>">
            <figcaption><?= $item->caption ?></figcaption>
        </figure><!--
    --><?php
    }
    ?>
        </div>
    </div>
    <button class="bt-prev" id="slideshow-bt-prev"><span>&laquo;</span></button>
    <button class="bt-next" id="slideshow-bt-next"><span>&raquo;</span></button>
</div>

<style>
.slideshow-container {
    width: 100%;
    white-space: nowrap;
}
.slideshow-images {
    width: 100%;
    overflow: hidden;
}
.slideshow-images figure {
    width: 100%;
    vertical-align: middle;
    display: inline-block;
}
.slideshow-images .wrap {
}
.slideshow-images img {
    width: 100%;
}
.slideshow-images figcaption {
    position: absolute;
    width: fit-content;
    width: -ms-fit-content;
    width: -moz-fit-content;
    width: -webkit-fit-content;
    box-sizing: content-box;
    padding: 3px 6px;
    z-index: 99;
    bottom: 1.5em;
    text-align: center;
    left: 0;
    right: 0;
    margin: 0 auto;
    color: #fff;
    background: rgba(20, 20, 20, 0.5);
}
.bt-prev,
.bt-next {
    position: absolute;
    top: 0;
    bottom: 0;
    height: 100%;
    width: 10%;
    min-width: 1.5em;
    max-width: 5em;
    background: transparent;
    border: none;
    outline: none;
}
.bt-prev > span,
.bt-next > span {
    font-size: 1.6em;
    color: #fff;
    text-shadow: 0 0 1px #000;
    -ms-text-shadow: 0 0 1px #000;
    -moz-text-shadow: 0 0 1px #000;
    -webkit-text-shadow: 0 0 1px #000;
}
.bt-prev:hover,
.bt-next:hover {
    background: rgba(100, 100, 100, 0.4);
}
.bt-prev {
    left: 0;
}
.bt-next {
    right: 0;
}
</style>

<script>
/* SLIDESHOW: BEGIN */
// CONFIG
var _time_slide = 300; // mili second
var _time_out = 3000; // mili second
var _auto_run = true;
var _pause_on_hover = true;

// PARAMS
var bt_prev = document.getElementById("slideshow-bt-prev");
var bt_next = document.getElementById("slideshow-bt-next");
var g = document.getElementById("slideshow-container");
var a = document.getElementById("slideshow-images");
var c = a.children[0];
var w, x; // w = width of figure; x = key of current figure element of c
// RUN
run();
window.addEventListener("resize", function(){
    setParams();
});

// FUNCTION
function setParams() {
    w = window.getComputedStyle(a, null).getPropertyValue("width");
    x = 0;
    c.style.transition = "margin " + String(0.001 * parseInt(_time_slide)) + "s ease";
}
function run() {
    setParams();
    bt_next.addEventListener("click", function() {
        next();
    });
    bt_prev.addEventListener("click", function() {
        prev();
    });
    if (_auto_run) {
        var auto_run = setInterval(function() {next();}, _time_out);
        if (_pause_on_hover) {
            g.addEventListener("mouseover", function() {
                clearInterval(auto_run);
            });
            g.addEventListener("mouseout", function() {
                auto_run = setInterval(function() {
                    next();
                }, _time_out); 
            });
        }
    }
};
function next() {
    if (x < c.children.length - 1) {
        x++;
    } else {
        x = 0;
    }
    setMargin(x);
};
function prev() {
    if (x > 0) {
        x--;
    } else {
        x = c.children.length - 1;
    }
    setMargin(x);
};
function setMargin(x) {
    c.style.marginLeft = "-" + String(x * parseInt(w)) + "px";
    c.style.marginRight = "+" + String(x * parseInt(w)) + "px";
};
/* SLIDESHOW: END */
</script>