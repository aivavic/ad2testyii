<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Adspaces */

$this->title = 'Create Adspaces';
$this->params['breadcrumbs'][] = ['label' => 'Adspaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adspaces-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'applications' => $applications
    ]) ?>

</div>
