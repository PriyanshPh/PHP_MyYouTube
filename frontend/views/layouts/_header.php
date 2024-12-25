<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

NavBar::begin([
    'brandLabel' => Html::img('https://cdn-icons-png.flaticon.com/512/174/174883.png', [
        'alt' => 'Logo',
        'style' => 'width: 30px; height: 30px; margin-right: 2px; vertical-align: top;'
    ]) . Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-lg navbar-light bg-light',
    ],
]);

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post'],
    ];
}
?>
    <form action="<?= Url::to(['/video/search']) ?>" class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" name="keyword" value="<?= Yii::$app->request->get('keyword') ?>">
        <button class="btn btn-outline-success">Search</button>
    </form>
<?php
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0'],  // Add ms-auto to align right
    'items' => $menuItems,
]);
NavBar::end();
