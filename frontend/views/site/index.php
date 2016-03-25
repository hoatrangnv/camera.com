<table class="table">
    <tr>
        <td style="width:25%;padding:0;border:none">
            <?= $this->render('//layouts/left') ?>
        </td>
        <td style="padding:0;border:none">
            <?=
            $this->render('//modules/carousel', [
                'slideshow_items' => $slideshow_items,
                'slideshow_item_image_suffix' => $slideshow_item_image_suffix
            ])
            ?>
        </td>
    </tr>
</table>