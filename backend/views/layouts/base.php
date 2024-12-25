<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/174/174883.png" type="image/x-icon" />
    <style>
    /* Tooltip container */
    .nav-icon {
        position: relative;
        display: inline-block;
    }

    /* Tooltip text */
    .nav-icon::after {
        content: 'Click To Create';
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
    .nav-icon::before {
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
    .nav-icon:hover::after,
    .nav-icon:hover::before {
        opacity: 1;
        visibility: visible;
    }
</style>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <div class="wrap h-100 d-flex flex-column">
        <header>
            <?php
            NavBar::begin([
                'brandLabel' => Html::img('https://cdn-icons-png.flaticon.com/512/174/174883.png', [
                    'alt' => 'Logo',
                    'style' => 'width: 30px; height: 30px; margin-right: 2px; vertical-align: top;'
                ]) 
                // . Yii::$app->name 
                . ' Studio',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-lg navbar-light bg-light',
                ],
            ]);
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0'],  // Add ms-auto to align right
                'encodeLabels' => false,  // Allow HTML rendering for icons
                'items' => array_merge(
                    [
                        [
                            'label' => '
                                <span class="nav-icon">
                                    <img src="https://cdn2.iconfinder.com/data/icons/video-12/32/Video-camera-add-512.png" alt="Create Icon" style="width: 20px; height: 20px; vertical-align: middle;">
                                </span>',
                            'url' => ['/video/create']
                        ],
                    ],
                    Yii::$app->user->isGuest
                        ? [['label' => 'Login', 'url' => ['/site/login']]]
                        : [[
                            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post'],
                        ]]
                ),
            ]);
            NavBar::end();
            ?>
        </header>
        <?= $content ?>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage(); ?>
