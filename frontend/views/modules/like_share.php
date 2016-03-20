<div class="share-social <?= !empty($class) ? $class : '' ?>">
    <div class="btn">    
        <g:plusone size="medium" data-href="<?= $this->context->link_canonical; ?>"></g:plusone>
    </div>
    <div class="btn">
        <div class="fb-like" size="small" data-share="true" data-layout="button_count" data-count="true" data-href="<?= $this->context->link_canonical; ?>"></div>
    </div> 
    <div class="clearfix"></div>
</div>
<?php
!empty($css) or $css = '';
$this->registerCss("
.share-social {}
.share-social .btn {
    float: left;
}
.share-social .btn:first-child {
    max-width: 5em;
}
$css");