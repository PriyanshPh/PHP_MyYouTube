<?php

namespace backend\controllers;

use common\models\Video;
use common\models\LoginForm;
use common\models\Subscriber;
use common\models\VideoView;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $userId = $user->id;
        $latestVideo = Video::find()->latest()->creator($userId)->limit(2)->one();
        $numberOfView = VideoView::find()->alias(alias: 'vv')
            ->innerJoin(Video::tableName() . ' v', 'v.video_id = vv.video_id')
            ->andWhere(['v.created_by' => $userId])
            ->count();
        $numberOfSubscribers = Yii::$app->cache->get('subscribers-'.$userId);
        if (!$numberOfSubscribers) {
            $numberOfSubscribers = $user->getSubscribers()->count();
            Yii::$app->cache->set('subscribers-'.$userId, $numberOfSubscribers);
        }
        $subscribers = Subscriber::find()
            ->with('user')
            ->andwhere(['channel_id' => $userId])
            ->orderBy('created_at DESC')
            ->limit(3)
            ->all();
        return $this->render('index', [
            'latestVideo' => $latestVideo,
            'numberOfView' => $numberOfView,
            'numberOfSubscribers' => $numberOfSubscribers,
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        $this->layout = 'auth';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
