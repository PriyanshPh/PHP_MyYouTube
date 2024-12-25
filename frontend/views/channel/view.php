<?php
/** @var $channel User
 * @var $this View
 * @var $dataProvider ActiveDataProvider
*/

use common\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

?>

<div class="jumbotron d-flex">
    <h1 class="display-4"><?= $channel->username ?></h1>
    <?php Pjax::begin([
    'options' => [
        'style' => 'display: flex; align-items: center; padding-left: 2%;'
    ]
]); ?>
    <?= $this->render('_subscribe', ['channel' => $channel]) ?>
<?php Pjax::end(); ?>

</div>
<hr class="my-4">

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '@frontend/views/video/_video_item',
    'layout' => "<div class='d-flex flex-wrap'>{items}</div>{pager}",
    'itemOptions' => [
        'tag' => false,
    ]
]) ?>