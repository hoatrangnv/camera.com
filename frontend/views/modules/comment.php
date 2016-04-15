<?php
$class = isset($options['class']) ? $options['class'] : '';
$link = isset($link) ? $link : $this->context->link_canonical;
?>
<div class="fb-comments <?= $class ?>" data-href="<?= $link ?>" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
<script>
<?php $this->beginBlock('JS_END') ?>
window.fbAsyncInit = function() {
FB.init({
    appId  : '<?= Yii::$app->params['fb_app_id'] ?>',
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true,  // parse XFBML
    version    : 'v2.5' // or v2.0, v2.1, v2.2, v2.3
});
<?php
if (isset($model)) {
    $counter_url = $model->getActionCounterUrl();
    $fql  = "SELECT url, normalized_url, share_count, like_count, comment_count, total_count, commentsbox_count, comments_fbid, click_count ";
    $fql .= "FROM link_stat WHERE url = '{$link}'";
    $fql = urlencode($fql);
?>
function updateCommentCount(id, url){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var data = JSON.parse(xhttp.responseText);
            var comment_count = data[0].commentsbox_count;
            console.log(comment_count);
            var xhttp2 = new XMLHttpRequest();
            xhttp2.onreadystatechange = function() {
                if (xhttp2.readyState == 4 && xhttp2.status == 200) {
//                    console.log(xhttp2.responseText);
                }
            }
            xhttp2.open("POST", url);
            xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp2.send("id=" + id + "&comment_count=" + comment_count + "&<?= Yii::$app->request->csrfParam; ?>=<?= Yii::$app->request->csrfToken; ?>");
        }
    };
    xhttp.open("POST", "https://api.facebook.com/method/fql.query", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("format=json&query=<?= $fql ?>");
}

FB.Event.subscribe('comment.create', function(response) {
    updateCommentCount(<?= $model->id ?>, '<?= $counter_url ?>');
});

FB.Event.subscribe('comment.remove', function(response){
    updateCommentCount(<?= $model->id ?>, '<?= $counter_url ?>');
});   

};
<?php
}
?>
<?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['JS_END'], $this::POS_END, 'JS_END');
