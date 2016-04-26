<?php

namespace app\models;

use Yii;
/**
 * This is the ActiveQuery class for [[Applications]].
 *
 * @see Applications
 */
class ApplicationsQuery extends \yii\db\ActiveQuery
{
    public function current()
    {
        return $this->andWhere('[[owner_id]]='.Yii::$app->user->id);
    }

    /**
     * @inheritdoc
     * @return Applications[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Applications|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
