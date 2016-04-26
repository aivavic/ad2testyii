<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AdspacesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adspaces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adspaces-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Adspaces', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'owner_id',
                'label'=>'Application',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getAppName();
                },
            ],
            'type',
            'width',
            'hight',
             'refreshTime',
             'clickType',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
