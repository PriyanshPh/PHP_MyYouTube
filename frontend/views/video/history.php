<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */
?>
<h1>Watch History</h1>
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_video_item',
    'layout' => "<div class='d-flex flex-wrap'>{items}</div>{pager}",
    'itemOptions' => [
        'tag' => false,
    ]
]) ?>