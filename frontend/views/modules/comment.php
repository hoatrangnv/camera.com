<?php

use yii\helpers\Url;

$fql  = "SELECT url, normalized_url, share_count, like_count, comment_count, total_count, commentsbox_count, comments_fbid, click_count ";
$fql .= "FROM link_stat WHERE url = '{$model->getLink()}'";
$fql = urlencode($fql);
?>
<div class="fb-comments" data-href="<?= $model->getLink() ?>" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
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

function updateCommentCount(id, url){
    $.ajax({
        url: 'https://api.facebook.com/method/fql.query?format=json&query=<?= $fql ?>',
        dataType: 'jsonp',
        success: function(data){
            //alert(JSON.stringify(data));
            $.post(
                url,
                {
                    <?= Yii::$app->request->csrfParam; ?>: '<?= Yii::$app->request->csrfToken; ?>',
                    id: id,
                    comment_count: data[0].commentsbox_count
                },function(data, textStatus, jqXHR){}
            ).fail(function(jqXHR, textStatus, errorThrown){});
        }
    });
}



FB.Event.subscribe('comment.create', function(response) {
    updateCommentCount(<?= $model->id ?>, '<?= $model->getActionCounterUrl() ?>');
});
FB.Event.subscribe('comment.remove', function(response){
    updateCommentCount(<?= $model->id ?>, '<?= $model->getActionCounterUrl() ?>');
});   

};
<?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['JS_END'], $this::POS_END, 'JS_END');
