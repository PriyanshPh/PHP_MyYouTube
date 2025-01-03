<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginContent('@frontend/views/layouts/base.php')
?>

<main role="main" class="d-flex">
    <?php echo $this->render('_sidebar') ?>
    <div class="content-wrapper p-3">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent() ?>