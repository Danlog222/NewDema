<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone
 * @property string $feedback
 * @property string $image
 * @property string $created_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    public $imageFile;
    public bool $rules = false;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'phone', 'feedback', 'rules'], 'required'],
            [['feedback'], 'string'],
            [['created_at'], 'safe'],
            [['full_name', 'phone', 'image'], 'string', 'max' => 255],
            [['rules'], 'required', 'requiredValue' => 1, 'message' => 'Обязательное соглашение'],
            ['full_name', 'match', 'pattern' => '/^([а-яё\-]+\s){2}[а-яё\s\-]+$/ui'],
            ['feedback', 'match', 'pattern' => '/^[а-яё]+$/ui'],
            ['feedback', 'string', 'min' => '20'],
            ['phone', 'match', 'pattern' => '/^\+7\(\d{3}\)\-\d{3}\-\d{2}\-\d{2}$/'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => ' jpeg, jpg, png', 'maxSize'=> 1024*1024*10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'ФИО',
            'phone' => 'Телефон',
            'feedback' => 'Отзыв',
            'image' => 'Image',
            'imageFile' => 'Фото',
            'created_at' => 'Created At',
        ];
    }
    public function upload($attr = 'image')
    {
        $this->$attr = Yii::$app->security->generateRandomString(). '.' . $this->imageFile->extension;
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->$attr);
            return true;
        } else {
            return false;
        }
    }
}

