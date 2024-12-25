<?php

use backend\assets\TagsInputAsset;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */
TagsInputAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <label for=""><?= $model->getAttributeLabel('thumbnail') ?></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                </div>
            </div>

            <?= $form->field($model, 'tags', [
                'inputOptions' => ['data-role' => 'tagsinput']
            ])->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <div class="embed-responsive embed-responsive-16by9 mb-3">
                <video class="embed-responsive-item"
                poster="<?= $model->getThumbnailLink() ?>"
                    src="<?= $model->getVideoLink() ?>"
                    controls width="100%"></video>
            </div>
            <div class="mb-3">
                <div class="text-muted">Video Link</div>
                <a href="<?= $model->getVideoLink() ?>">
                    Open Video
                </a>
            </div>

            <div class="mb-3">
                <div class="text-muted">Video Name</div>
                <?= $model->video_name ?>
            </div>
            <?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>