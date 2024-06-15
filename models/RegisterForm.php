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
 * @property string $passport
 * @property string $password
 * @property string $phone
 * @property string $auth_key
 * @property int $role_id
 * @property int $category_id
 *
 * @property Application[] $applications
 * @property Category $category
 * @property Role $role
 */
class RegisterForm extends \yii\base\Model 
{
    public string $full_name = '';
    public string $login = '';
    public string $email = '';
    public string $passport = '';
    public string $password = '';
    public string $phone = '';
    public int $category_id = 0;
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
            [['full_name', 'login', 'email', 'passport', 'password', 'phone', 'category_id'], 'required'],
            [['full_name', 'login', 'email', 'passport', 'password', 'phone'], 'string', 'max' => 255],
            [['login'], 'unique', 'targetClass' => User::class,],
            [['email'], 'unique', 'targetClass' => User::class,],
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
            'passport' => 'серия и номер пасспорта',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'auth_key' => 'Auth Key',
            'role_id' => 'Роль',
            'category_id' => 'Категория граждан',
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
            $user->category_id = $this->category_id;

            if(!$user->save()){
                return VarDumper::dump($user->errors,10,true);die;
            }
        }
        return $user ?? false;
    }
}

