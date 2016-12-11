<?php

  namespace app\models;

  use Yii;

  /**
   * This is the model class for table "users".
   *
   * @property string $id
   * @property string $login_name
   * @property string $password
   * @property string authKey
   * @property string access_token
   */
  class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
    /**
     * @inheritdoc
     */
    public static function tableName() {
      return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
      return [
        [['username', 'password'], 'required'],
        [['username'], 'string', 'max' => 500],
        [['password'], 'string', 'max' => 64]
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
      return [
        'id'         => 'ID',
        'username' => 'Login Name',
        'password'   => 'Password',
      ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
      return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = NULL) {
      return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username) {
      return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
      return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
      return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
      return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
      return $this->password === $password;
    }
  }
