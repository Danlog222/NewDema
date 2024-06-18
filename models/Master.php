<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "master".
 *
 * @property int $id
 * @property string $title
 *
 * @property Application[] $applications
 */
class Master extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'title' => 'Название',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['master_id' => 'id']);
    }
    public static function getMaster(){
        return (new Query())
        ->select('title')
        ->from('master')
        ->indexBy('id')
        ->column()
        ;
    }
}
