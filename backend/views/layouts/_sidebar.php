<?php
?>
<aside class="shadow">
    <?= \yii\bootstrap5\Nav::widget([
        'options' => ['class' => 'd-flex flex-column nav-pills'],
        'encodeLabels' => false,  // Allow HTML rendering for icons
        'items' => [
            [
                'label' => '<img src="https://cdn.icon-icons.com/icons2/3250/PNG/512/glance_filled_icon_202179.png" alt="Dashboard Icon" style="width: 20px; height: 20px; vertical-align: middle; margin-right: 8px;"> Dashboard',
                'url' => ['/site/index']
            ],
            [
                'label' => '<img src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3212901/play-box-multiple-icon-md.png" alt="Videos Icon" style="width: 20px; height: 20px; vertical-align: middle; margin-right: 8px;"> Content',
                'url' => ['/video/index']
            ]
        ]
    ]) ?>
</aside>
