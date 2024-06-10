<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $depatment_id
 * @property string $date
 * @property string $desription
 * @property string $created_at
 * @property int $user_id
 * @property int $status_id
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['depatment_id', 'date', 'desription', 'user_id', 'status_id'], 'required'],
            [['depatment_id', 'user_id', 'status_id'], 'integer'],
            [['date', 'created_at'], 'safe'],
            [['desription'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'depatment_id' => 'Depatment ID',
            'date' => 'Date',
            'desription' => 'Desription',
            'created_at' => 'Created At',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
        ];
    }
}
