<div id="slideshow-container">
    <div id="slideshow-images">
        <div class="wrap">
    <?php
    foreach ($data as $item) {
        ?><figure>
            <img src="<?= $item['img_src'] ?>" alt="<?= $item['img_alt'] ?>">
            <?php
            if ($item['caption'] != '') {
            ?>
            <figcaption><?= $item['caption'] ?></figcaption>
            <?php
            }
            ?>
        </figure><?php
    }
    ?>
        </div>
    </div>
    <?php
    $num = count($data);
    ?>
    <button class="bt-prev" <?= $num < 2 ? 'style="display:none"' : '' ?>>
        <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
    <button class="bt-next" <?= $num < 2 ? 'style="display:none"' : '' ?>>
        <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
</div>

<style>
#slideshow-container {
    position: relative;
    width: 100%;
    white-space: nowrap;
}
#slideshow-images {
    width: 100%;
    overflow: hidden;
}
#slideshow-images figure {
    position: relative;
    width: 100%;
    vertical-align: middle;
    display: inline-block;
}
#slideshow-images .wrap {
}
#slideshow-images img {
    vertical-align: middle;
    width: 100%;
}
#slideshow-images figcaption {
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
    width: 12%;
    min-width: 1.5em;
    background: transparent;
    border: none;
    outline: none;
    opacity: 0.6;
}
.bt-prev:hover,
.bt-next:hover {
    opacity: 1;
    background: rgba(120, 120, 120, 0.2);
}
.bt-prev {
    left: 0;
}
.bt-next {
    right: 0;
}
.bt-prev > svg,
.bt-next > svg {
    width: 48px;
    height: 48px;
}
@media screen and (max-width: 640px) {
.bt-prev > svg,
.bt-next > svg {
    width: 36px;
    height: 36px;
}
}
.bt-prev > span {
    background-position: 0 0;
}
.bt-next > span {
    background-position: -28px 0;
}
</style>

<script>
/* SLIDESHOW: BEGIN */
// CONFIG
// opts = {"auto_run":true,"time_slide":300,"time_out":3000,"pause_on_hover":true}
var opts = <?= json_encode($options) ?>;
// PARAMS
var g = document.getElementById("slideshow-container");
var a = document.getElementById("slideshow-images");
var c = a.children[0];
var bt_prev = g.getElementsByClassName("bt-prev")[0];
var bt_next = g.getElementsByClassName("bt-next")[0];
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
    c.style.transition = "margin " + String(0.001 * parseInt(opts.time_slide)) + "s ease";
}
function run() {
    setParams();
    bt_next.addEventListener("click", function() {
        next();
    });
    bt_prev.addEventListener("click", function() {
        prev();
    });
    if (opts.auto_run) {
        var auto_run = setInterval(function() {next();}, opts.time_out);
        if (opts.pause_on_hover) {
            g.addEventListener("mouseover", function() {
                clearInterval(auto_run);
            });
            g.addEventListener("mouseout", function() {
                auto_run = setInterval(function() {
                    next();
                }, opts.time_out); 
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