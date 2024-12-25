<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */

use yii\bootstrap5\LinkPager;
?>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => LinkPager::class
    ],
    'itemView' => '_video_item',
    'layout' => "<div class='d-flex flex-wrap'>{items}</div>{pager}",
    'itemOptions' => [
        'tag' => false,
    ]
]) ?>