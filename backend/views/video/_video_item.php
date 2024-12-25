<?php

/**
 * @var $model \common\models\Video
 */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div class="media d-flex align-items-start">
    <a href="<?= Url::to(['/video/update', 'video_id' => $model->video_id]) ?>">
        <div class="embed-responsive embed-responsive-16by9 mr-2">
            <video class="embed-responsive-item"
                poster="<?= $model->getThumbnailLink() ?>"
                src="<?= $model->getVideoLink() ?>"
                width="110px"></video>
        </div>
    </a>
    <div class="media-body" style="padding-left: 10px;">
        <h6 class="mt-0"><?= $model->title ?></h6>
        <?= StringHelper::truncateWords($model->description, 10) ?>
    </div>
</div>