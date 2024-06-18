<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $user_id
 * @property int $status_id
 * @property string $date
 * @property string $created_at
 * @property string $description
 * @property int $master_id
 *
 * @property Master $master
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    public $time;
    public $date_str;
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
            [['user_id', 'status_id', 'date_str', 'time', 'description', 'master_id'], 'required'],
            [['user_id', 'status_id', 'master_id'], 'integer'],
            [['date', 'created_at'], 'safe'],
            [['description'], 'string'],
            [['master_id'], 'exist', 'skipOnError' => true, 'targetClass' => Master::class, 'targetAttribute' => ['master_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заявки',
            'user_id' => 'Пользователь',
            'status_id' => 'Статус заявки',
            'date' => 'Дата приёма',
            'created_at' => 'Время создания',
            'description' => 'Описание причины',
            'master_id' => 'Мастер',
        ];
    }

    /**
     * Gets query for [[Master]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(Master::class, ['id' => 'master_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function checkNew()
    {
        $res = self::find()
        ->where(['date' => $this->date])
        ->andWhere(['in', 'status_id', [Status::getStatusId('Новая'), Status::getStatusId('Выполнено')]])
        ->andWhere(['master_id' => $this->master_id])
        ->count()
        ;
        if($res) {
            $this->addError('time', 'Ошибка времени');
            $this->addError('date_str', 'Дата - неверная');
            return false;
        }
      return true;
    }
}
