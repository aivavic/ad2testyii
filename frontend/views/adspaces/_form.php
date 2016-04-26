<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Adspaces */
/* @var $form yii\widgets\ActiveForm */
//\yii\helpers\VarDumper::dump($applications); die();
?>

<div class="adspaces-form">

    <?php $form = ActiveForm::begin(); ?>
<!--    $authors = Author::find()->all();-->
<!--    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'-->
<!--    $items = ArrayHelper::map($authors,'id','name');-->
<!--    $params = [-->
<!--    'prompt' => 'Укажите автора записи'-->
<!--    ];-->
<!--    echo $form->field($model, 'author')->dropDownList($items,$params);-->

    <?= $form->field($model, 'ownedApp')->dropDownList($applications); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'banner' => 'Banner', 'video' => 'Video', 'native' => 'Native', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refreshTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clickType')->dropDownList([ 'inapp' => 'Inapp', 'external' => 'External', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
