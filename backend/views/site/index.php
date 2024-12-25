<?php

/** @var $this yii\web\View 
 * @var $latestVideo \common\models\Video
 * @var $numberOfView integer
 * @var $subscribers \common\models\Subscriber[]
 * @var $numberOfSubscribers integer
 */

use yii\helpers\Url;

$this->title = 'YouTube';
?>
<div class="site-index d-flex">
    <div class="card m-2" style="width: 15rem;">
        <?php if ($latestVideo): ?>
            <div class="embed-responsive embed-responsive-16by9 mb-3">
                <video class="embed-responsive-item"
                    poster="<?= $latestVideo->getThumbnailLink() ?>"
                    src="<?= $latestVideo->getVideoLink() ?>"
                    controls width="100%"></video>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $latestVideo->title ?></h5>
                <p class="card-text">
                    Likes: <?= $latestVideo->getLikes()->count() ?>
                    Views: <?= $latestVideo->getViews()->count() ?>
                </p>
                <a href="<?= Url::to(['/video/update', 'video_id' => $latestVideo->video_id]) ?>" class="btn btn-primary">
                    Edit
                </a>
            </div>
        <?php else: ?>
            <div class="card-body">
                You don't have uploaded videos yet.
            </div>
        <?php endif; ?>
    </div>
    <div class="card m-2" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Total Views</h5>
            <p class="card-text" style="font-size: 45px;">
                <?= $numberOfView ?>
            </p>
        </div>
    </div>
    <div class="card m-2" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Total Subscribers</h5>
            <p class="card-text" style="font-size: 45px;">
                <?= $numberOfSubscribers ?>
            </p>
        </div>
    </div>
    <div class="card m-2" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Latest Subscribers</h5>
            <?php foreach ($subscribers as $subscriber): ?>
                <div>
                    <?= $subscriber->user->username ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>