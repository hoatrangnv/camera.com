<?php

use common\utils\Pagination;

$pageOpt = Pagination::data(
    ['current' => $pagination['current'], 'total' => $pagination['total']],
    ['left' => 1, 'right' => 2]
);
?>
<div class="clearfix paging">
    <ul class="pagination fr">
        <?php
        if (count($pageOpt['arr']) > 1) {
            if ($pageOpt['btn']['first']) {
                ?>
                <li><a title="Trở về trang đầu" href="<?= $this->context->link_canonical ?>">«</a></li>
                <?php
            }
            foreach ($pageOpt['arr'] as $p) {
                ?>
                <li class="<?= $p == $pagination['current'] ? 'active' : '' ?>"><a title="Trang <?= $p ?>" href="<?= $this->context->link_canonical ?><?= $p > 1 ? '?page=' . $p : '' ?>"><?= $p ?></a></li>
                <?php
            }
            if ($pageOpt['btn']['last']) {
                ?>
                <li><a title="Đi đến trang cuối" href="<?= $this->context->link_canonical . '?page=' . $pagination['total'] ?>">»</a></li>
                <?php
            }
        }
        ?>
    </ul>
    <div class="result-count fl">
        Hiển thị <?= $pagination['firstItemOnPage'] < $pagination['lastItemOnPage'] ? $pagination['firstItemOnPage'] . '&ndash;' . $pagination['lastItemOnPage'] : ( $pagination['firstItemOnPage'] == $pagination['lastItemOnPage'] ? $pagination['firstItemOnPage'] : 0 ) ?> / <?= $pagination['totalItems'] ?> bài viết
    </div>
</div>