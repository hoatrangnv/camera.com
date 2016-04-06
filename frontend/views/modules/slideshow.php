<div id="slideshow-container">
    
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
// opts = {"auto_run":true,"time_slide":300,"time_out":3000,"pause_on_hover":true}
var opts = <?= json_encode($options) ?>;
// items = { ... {"caption":"Hello!!","link":"//google.com","img_src":"//image.png","img_alt":"Say hello"} ... }
var items = <?= json_encode($data) ?>
// ELEMENT
var g = document.getElementById("slideshow-container");
g.classList.add("slideshow-container");
var a = document.createElement("div");
var c = document.createElement("div");
a.classList.add("slideshow-images");
c.classList.add("wrap");
g.appendChild(a);
a.appendChild(c);
var bt_prev = document.createElement("button");
var bt_next = document.createElement("button");
bt_prev.classList.add("bt-prev");
bt_next.classList.add("bt-next");
bt_prev.innerHTML = "<span>&laquo;</span>";
bt_next.innerHTML = "<span>&raquo;</span>";
g.appendChild(bt_prev);
g.appendChild(bt_next);
var w, x; // w = width of figure; x = key of current figure element of c
// RUN
run();
window.addEventListener("resize", function(){
    setParams();
});

// FUNCTION
function createImages() {
    for (var i = 0; i < items.length; i++) {
        var fig = document.createElement("figure");
        var img = document.createElement("img");
        img.setAttribute("src", items[i].img_src);
        img.setAttribute("alt", items[i].img_alt);
        var capt = document.createElement("figcaption");
        capt.innerHTML = items[i].caption;
        fig.appendChild(img);
        fig.appendChild(capt);
        c.appendChild(fig);
    }
}
function setParams() {
    w = window.getComputedStyle(a, null).getPropertyValue("width");
    x = 0;
    c.style.transition = "margin " + String(0.001 * parseInt(opts.time_slide)) + "s ease";
}
function run() {
    createImages();
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