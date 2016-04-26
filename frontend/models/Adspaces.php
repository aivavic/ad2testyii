<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adspaces".
 *
 * @property integer $id
 * @property integer $ownedApp_id
 * @property string $type
 * @property string $width
 * @property string $hight
 * @property string $refreshTime
 * @property string $clickType
 */
class Adspaces extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adspaces';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['width', 'hight'], 'required'],
            [['width', 'hight', 'refreshTime'], 'integer'],
            [['refreshTime'], 'default', 'value' => 30],
            [['type', 'clickType'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ownedApp_id' => 'Owned App ID',
            'type' => 'Type',
            'width' => 'Width',
            'hight' => 'Hight',
            'refreshTime' => 'Refresh Time (Default 30s)',
            'clickType' => 'Click Type',
        ];
    }

    public function getOwnedApp()
    {
        return $this->hasOne(Applications::className(), ['id' => 'ownedApp_id']);
    }

    public function getAppName()
    {
        $application = $this->ownedApp;
//\yii\helpers\VarDumper::dump($application); die();
        return $application ? $application->appName : '';
    }
    /**
     * @inheritdoc
     * @return AdspacesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdspacesQuery(get_called_class());
    }


}
