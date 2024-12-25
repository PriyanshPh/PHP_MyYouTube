<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="upload-icon">
            <i class="fas fa-upload"></i>
        </div>
        <br>
        <p class="m-0">Drag and drop a file you want to upload</p>
        <p class="text-muted">Your video will be private until you publish it</p>

        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]) ?>

        <?= $form->errorSummary($model) ?>

        <label for="videoFile" class="btn btn-primary btn-file">
            Select File
            <input type="file" name="video" id="videoFile" class="form-control" aria-label="Upload Video">
        </label>
        <?php ActiveForm::end(); ?> <!-- Properly close the form -->
    </div>

</div>