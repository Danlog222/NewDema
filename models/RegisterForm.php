<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $full_name
 * @property string $login
 * @property string $email
 * @property string $phone
 * @property string $passport
 * @property string $password
 * @property int $role_id
 * @property string $auth_key
 *
 * @property Application[] $applications
 * @property Role $role
 */
class RegisterForm extends \yii\base\Model
{
    public string $full_name = '';
    public string $login = '';
    public string $email = '';
    public string $phone = '';
    public string $passport = '';
    public string $password = '';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'login', 'email', 'phone', 'passport', 'password',], 'required'],
            [['full_name', 'login', 'email', 'phone', 'passport', 'password',], 'string', 'max' => 255],
            [['login'], 'unique', 'targetClass' => User::class,],
            [['email'], 'unique', 'targetClass' => User::class,],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^\+7\(\d{3}\)\-\d{3}\-\d{2}\-\d{2}$/'],
            ['full_name', 'match', 'pattern' => '/^[а-яёА-ЯЁ\s-]+$/u'],
            ['login', 'match', 'pattern' => '/^[a-z]+$/i'],
            ['password', 'match', 'pattern' => '/^[a-z0-9]+$/i'],
            ['password', 'string', 'min' => '6'],
            ['passport', 'match', 'pattern' => '/^\d{4}\s\d{6}$/'],
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
            'login' => 'Логин',
            'email' => 'Email',
            'phone' => 'Телефон',
            'passport' => 'Паспорт',
            'password' => 'Пароль',
            'role_id' => 'Role ID',
            'auth_key' => 'Auth Key',
        ];
    }
    
    public function registerUser()
    {
        if ($this->validate()) {
        $user = new User();
        $user->attributes = $this->attributes;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->role_id = Role::getRoleId('user');
        if(!$user->save()){
            VarDumper::dump($user->errors,10,true);
        }
        }
        return $user ?? false;  
    }

}
