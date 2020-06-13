<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?//= \yii2assets\pdfjs\PdfJs::widget([
//    'url'=> Url::base().'/images/pdf.pdf'
//]); ?>

<div class="row">
<? foreach ($model as $item): ?>

    <?php
    $ext = explode('.', $item->name)[1];
    if ($ext == 'pdf'):?>
    <div class="col-md-6">
        <?= \yii2assets\pdfjs\PdfJs::widget([
            'url' => Url::base() . '/images/' . $item->name,
//            'width'=>'30%',
        ]);
        ?>
    </div>
    <? else: ?>
    <div class="col-md-6">
        <a href="<?= $item->path . $item->name ?>" target="_blank"><img src="<?= 'images/' . $item->name ?>" width="500"
                                                            height="500"></a>
    </div>
    <? endif; ?>

<? endforeach; ?>

</div>