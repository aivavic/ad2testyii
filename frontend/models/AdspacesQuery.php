<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Adspaces]].
 *
 * @see Adspaces
 */
class AdspacesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Adspaces[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Adspaces|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
