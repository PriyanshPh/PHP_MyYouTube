<?php
/** @var $model \common\models\Video */

use yii\helpers\Url;
?>

<style>
    /* Tooltip container */
    .tooltip-icon {
        position: relative;
        display: inline-block;
    }

    /* Tooltip text */
    .tooltip-icon::after {
        content: attr(data-tooltip);
        position: absolute;
        top: 150%; /* Position the tooltip below the icon */
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 5px 8px;
        border-radius: 4px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s;
        font-size: 14px;
        z-index: 10;
    }

    /* Tooltip arrow */
    .tooltip-icon::before {
        content: '';
        position: absolute;
        top: 120%; /* Position the arrow below the icon */
        left: 50%;
        transform: translateX(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent #333 transparent;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s;
    }

    /* Show the tooltip on hover */
    .tooltip-icon:hover::after,
    .tooltip-icon:hover::before {
        opacity: 1;
        visibility: visible;
    }
</style>

<a href="<?= Url::to(['/video/like', 'id' => $model->video_id]) ?>" 
   class="btn btn-sm <?= $model->isLikedBy(Yii::$app->user->id) ? 'btn-outline-primary' : 'btn-outline-secondary' ?> tooltip-icon"
   data-tooltip="For Like" data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-up"></i> <?= $model->getLikes()->count() ?>
</a>

<a href="<?= Url::to(['/video/dislike', 'id' => $model->video_id]) ?>" 
   class="btn btn-sm <?= $model->isDislikedBy(Yii::$app->user->id) ? 'btn-outline-primary' : 'btn-outline-secondary' ?> tooltip-icon"
   data-tooltip="For Dislike" data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-down"></i> <?= $model->getDislikes()->count() ?>
</a>
