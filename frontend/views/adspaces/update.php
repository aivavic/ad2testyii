<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Adspaces */

$this->title = 'Update Adspaces: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adspaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adspaces-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'applications' => $applications
    ]) ?>

</div>
