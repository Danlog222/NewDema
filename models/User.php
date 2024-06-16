<?php

namespace app\models;

use Yii;

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
class User extends \yii\db\ActiveRecord
{
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
            [['full_name', 'login', 'email', 'passport', 'password', 'phone', 'auth_key', 'role_id', 'category_id'], 'required'],
            [['role_id', 'category_id'], 'integer'],
            [['full_name', 'login', 'email', 'passport', 'password', 'phone', 'auth_key'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['email'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'login' => 'Login',
            'email' => 'Email',
            'passport' => 'Passport',
            'password' => 'Password',
            'phone' => 'Phone',
            'auth_key' => 'Auth Key',
            'role_id' => 'Role ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }
}
