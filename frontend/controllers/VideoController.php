<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoLike;
use common\models\User;
use common\models\VideoView;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['like', 'dislike', 'history'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verb' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'like' => ['post'],
                    'dislike' => ['post'],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main';
        $dataProvider = new ActiveDataProvider([
            // 'query' => Video::find()->published()->latest(),
            'query' => Video::find()->with('createdBy')->published()->latest(),
            'pagination' => [
                'pageSize' => 4
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        // $channel = $this->findChannel($username)
        $this->layout = 'auth';

        $video = $this->findVideo($id);
        $videoView = new VideoView();
        $videoView->video_id = $id;
        $videoView->user_id = Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();

        $channel = $video->createdBy;

        $similarVideos = Video::find()->published()
            ->andWhere(['NOT', ['video_id' => $id]])
            ->byKeyword($video->title)
            ->limit(10)->all();

        return $this->render('view', [
            'model' => $video,
            'similarVideos' => $similarVideos,
            'channel' => $channel
        ]);
    }

    public function actionLike($id)
    {
        $video = $this->findVideo($id);
        $userId = Yii::$app->user->id;

        $videoLikeDislike = VideoLike::find()->userIdVideoId($userId, $id)->one();
        if (!$videoLikeDislike) {
            $this->saveLikeDislike($id, $userId, VideoLike::TYPE_LIKE);
        } else if ($videoLikeDislike->type == VideoLike::TYPE_LIKE) {
            $videoLikeDislike->delete();
        } else {
            $videoLikeDislike->delete();
            $this->saveLikeDislike($id, $userId, VideoLike::TYPE_LIKE);
        }

        return $this->renderAjax('_buttons', [
            'model' => $video,
        ]);
    }

    public function actionDislike($id)
    {
        $video = $this->findVideo($id);
        $userId = Yii::$app->user->id;

        $videoLikeDislike = VideoLike::find()->userIdVideoId($userId, $id)->one();
        if (!$videoLikeDislike) {
            $this->saveLikeDislike($id, $userId, VideoLike::TYPE_DISLIKE);
        } else if ($videoLikeDislike->type == VideoLike::TYPE_DISLIKE) {
            $videoLikeDislike->delete();
        } else {
            $videoLikeDislike->delete();
            $this->saveLikeDislike($id, $userId, VideoLike::TYPE_DISLIKE);
        }

        return $this->renderAjax('_buttons', [
            'model' => $video,
        ]);
    }

    public function actionSearch($keyword)
    {
        $this->layout = 'main';
        $query = Video::find()->published()->latest();
        if ($keyword) {
            $query->byKeyword($keyword)//                ->orderBy("(MATCH(title, description, tags) AGAINST ('$keyword') DESC")
            ;
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('search', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHistory()
    {
        $this->layout = 'main';
        $query = Video::find()->alias('v')
            ->innerJoin("(SELECT video_id, 
            MAX(created_at) as max_date FROM video_view 
            WHERE user_id = :userId GROUP BY video_id) vv", 'vv.video_id = v.video_id', ['userId' => Yii::$app->user->id])
            ->orderBy("vv.max_date DESC");
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('history', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findVideo($id)
    {
        $video = Video::findOne($id);
        if (!$video) {
            throw new NotFoundHttpException('The requested Video does not exist.');
        }
        return $video;
    }

    protected function saveLikeDislike($videoId, $userId, $type)
    {
        $videoLikeDislike = new VideoLike();
        $videoLikeDislike->video_id = $videoId;
        $videoLikeDislike->user_id = $userId;
        $videoLikeDislike->type = $type;
        $videoLikeDislike->created_at = time();
        $videoLikeDislike->save();
    }
    
    /**
     * @param $username
     * @throws NotFoundHttpException
     */
    protected function findChannel($username){
        $channel = User::findByUsername($username);
        if (!$channel) {
            throw new NotFoundHttpException("Channel not found");
        }
        return $channel;
    }
}