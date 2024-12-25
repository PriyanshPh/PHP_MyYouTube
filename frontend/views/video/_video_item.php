<?php
/** @var $model \common\models\Video */

use yii\helpers\Url;

?>

<div class="card m-3" style="width: 14rem;">
    <a href="<?= Url::to(['/video/view', 'id' => $model->video_id]) ?>">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item"
                   poster="<?= $model->getThumbnailLink() ?>"
                   src="<?= $model->getVideoLink() ?>" width="100%"></video>
        </div>
    </a>
    <div class="card-body p-2">
        <h6 class="card-title m-0"><?= $model->title ?></h6>
        <p class="text-muted m-0 card-text"><?= \common\helpers\Html::channelLink($model->createdBy) ?></p>
        <p class="text-muted m-0 card-text"><?= $model->getViews()->count() ?> views
            . <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?></p>
    </div>
</div>