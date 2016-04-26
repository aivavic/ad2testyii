<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "applications".
 *
 * @property integer $id
 * @property string $app_key
 * @property integer $owner_id
 * @property string $appName
 * @property string $platform
 * @property string $store_url
 * @property string $status
 * @property string $approved
 *
 * @property User $owner
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appName', 'platform', 'store_url'], 'required'],
            [['owner_id'], 'integer'],
            [['platform', 'status', 'approved'], 'string'],
            [['app_key'], 'string', 'max' => 36],
            [['appName'], 'string', 'max' => 100],
            [['store_url'], 'string', 'max' => 2048],
//            [['app_key'], 'unique'],
//            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_key' => 'App Key',
            'owner_id' => 'Owner ID',
            'appName' => 'App Name',
            'platform' => 'Platform',
            'store_url' => 'Store Url',
            'status' => 'Status',
            'approved' => 'Approved',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

    public function getOwnerName()
    {
        $user = $this->owner;

        return $user ? $user->username : '';
    }


    /**
     * @inheritdoc
     * @return ApplicationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApplicationsQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this->app_key) {
                $this->app_key = Yii::$app->getSecurity()->generateRandomString();
            }

            if (empty($this->owner_id)) {
                $this->owner_id = Yii::$app->user->id;
            }

            return true;
        } else {
            return false;
        }
    }


}
