<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_view}}".
 *
 * @property int $id
 * @property string $video_id
 * @property int|null $user_id
 * @property int|null $created_at
 *
 * @property Video $video
 */
class VideoView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_view}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::class, 'targetAttribute' => ['video_id' => 'video_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Video]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\VideoQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::class, ['video_id' => 'video_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoViewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoViewQuery(get_called_class());
    }
}
