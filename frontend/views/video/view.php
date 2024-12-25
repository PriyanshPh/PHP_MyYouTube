<?php

/** @var $model \common\models\Video
 * @var $similarVideos \common\models\Video[]
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item"
                poster="<?= $model->getThumbnailLink() ?>"
                src="<?= $model->getVideoLink() ?>" width="100%" controls></video>
        </div>
        <h6 class="mt-2"><?= $model->title ?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div><?= $model->getViews()->count() ?> views
                . <?= Yii::$app->formatter->asDate($model->created_at) ?></div>
            <div>
                <?php \yii\widgets\Pjax::begin() ?>
                <?= $this->render('_buttons', ['model' => $model]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
        <div>
            <div style="display: flex; align-items: center; gap: 20px;">
                <?= \common\helpers\Html::channelLink($model->createdBy) ?>
                <?php Pjax::begin([]); ?>
                <?= $this->render('@frontend/views/channel/_subscribe', ['channel' => $channel]) ?>
                <?php Pjax::end(); ?>
            </div>
            <?= Html::encode($model->description) ?>
        </div>
    </div>
    <div class="col-sm-4 p-0">
        <?php foreach ($similarVideos as $similarVideo): ?>
            <div class="media d-flex align-items-start">
                <a href="<?= Url::to(['/video/view', 'id' => $similarVideo->video_id]) ?>">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item w-100"
                            poster="<?= $similarVideo->getThumbnailLink() ?>"
                            src="<?= $similarVideo->getVideoLink() ?>"></video>
                    </div>
                </a>
                <div class="media-body" style="padding-left: 10px;">
                    <h6 class="m-0"><?= $similarVideo->title ?></h6>
                    <div class="text-muted">
                        <p class="m-0">
                            <?= \common\helpers\Html::channelLink($similarVideo->createdBy) ?>
                        </p>
                        <small>
                            <?= $similarVideo->getViews()->count() ?> views
                            . <?= Yii::$app->formatter->asRelativeTime($similarVideo->created_at) ?>
                        </small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>