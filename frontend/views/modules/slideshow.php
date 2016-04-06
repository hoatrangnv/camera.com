<div id="slideshow-container">
    <div id="slideshow-images">
        <div class="wrap">
    <?php
    foreach ($data as $item) {
        ?><figure>
            <img src="<?= $item['img_src'] ?>" alt="<?= $item['caption'] ?>">
            <figcaption><?= $item['img_alt'] ?></figcaption>
        </figure><?php
    }
    ?>
        </div>
    </div>
    <button class="bt-prev"><span></span></button>
    <button class="bt-next"><span></span></button>
</div>

<style>
#slideshow-container {
    width: 100%;
    white-space: nowrap;
}
#slideshow-images {
    width: 100%;
    overflow: hidden;
}
#slideshow-images figure {
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
    max-width: 6em;
    background: transparent;
    border: none;
    outline: none;
    opacity: 0.6;
}
.bt-prev:hover,
.bt-next:hover {
    opacity: 1;
}
.bt-prev {
    left: 0;
}
.bt-next {
    right: 0;
}
.bt-prev > span,
.bt-next > span {
    display: block;
    margin: 0 auto;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADcAAAAtCAQAAACgnzswAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfgAxIEDy47Z+06AAADW0lEQVRYw73Yz28TRxTA8a9nNsZyHNcYbGyCopaoAqUcClzoIShNpXLowWkvKJeqhyoEcaMHzvwBSO0fUEBtJQ4cInFAtIeKplRIKYkITVF/pBZxnMTaWCgY18iu2enBuzS08e6Od9Un7WGeLH80s5p9byaCdwhA8CY52lRYwsKy84Ij5DCocB8L7LxLRHxhCcbJ2uMK39DCQhDlXXJ21uRb6t6g9MQE/YyTnRy88fH00bXSLxH6eYQiwihDE9mZDz8ZNVeXLLKs0QaUj/XqihkkmWBq8uKzp0op9WRz1zRTRIEoU7umn2wqpdSzp5MXmWKCJAbCa6ncZhbvzOzy+VgCILn3cBxsjsPx5F6AWOLy+clBsowTR7j9p9DB4OHCYh2TBtDAXKw/XOjk/YJSD3vr86bFT5goIvRx4KvFQj6TBzCi7x0v/rxkkaXc/R1KPazW5jfmUSgiVOlv7tYDpSa2zPf2vlPAKgPNlA4oNbE7PH+xtxRQJqEDSk2s/dJGVig9UAbAegBlIEwblAExTVAGxrRAGQKmAcpQMN+gBCJOiQmA+QFbKInoFM/AmDe4xl8SydvkQ8G8wBRFyQhvjKWvXwgFcwF/uPeoj6YgB58WHKy+depKIAzAos0dlmvtU1fqW51ULPHZ+0BWkIYDrzq/rJTLLSrM9Qhtjzkq5Val7AwHh4C0oAqlopPctz9jkONECNwJchlj335nWCoCVYEJZ2acSQ+k757LGBzkpFeT4xICg5MczBh3zw2kO6n61pkZwJQ8Zs96bPFB4Vg0BpDOfPDatfnGKyRZRfXQxm3Dhkcc7PSl7x5TYk4CG+z5XYQEdsFumqwzS0uiaLNBOhTQHfsTq/MRa4UCumN17G+mCgX0xiynAAUHfWH/lNdgoE9se/PQO+gbe7k16g3UwP7d+OmDWth/21o9UBPbqWn3D2pjOx9J3MEEJUAhEIwyrIN1O3C5gSn6WbHP5q/rYd2Pk13Bq/PN3TzgOX28kzR+1MLcDssWUGeW9Zvm6UtOPRweKeSBVOcp5PUw96uAHcBa9dYGUOs8tzZqVR3M615l25Leuz8sV4offfFrg2X+QGGRbKRmFw7J8srZL7/e9IP5vTWKM4bTdZS4/eLWaIwhO7vObRpe2P8efwMddU5dQuirCQAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNi0wMy0xOFQwNDoxNTo0Ni0wNDowMAbU5nIAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTYtMDMtMThUMDQ6MTU6NDYtMDQ6MDB3iV7OAAAAAElFTkSuQmCC);
    background-repeat: no-repeat;
    background-size: auto;
    height: 45px;
    width: 27px;
    -webkit-transform: scale(0.7, 0.7);
    -moz-transform: scale(0.7, 0.7);
    -ms-transform: scale(0.7, 0.7);
    transform: scale(0.7, 0.7);
}
@media screen and (max-width: 640px) {
.bt-prev > span,
.bt-next > span {
    -webkit-transform: scale(0.5, 0.5);
    -moz-transform: scale(0.5, 0.5);
    -ms-transform: scale(0.5, 0.5);
    transform: scale(0.5, 0.5);
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