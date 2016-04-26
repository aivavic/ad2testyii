<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Applications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'app_key')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'owner_id')->textInput() ?>

    <?= $form->field($model, 'appName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'platform')->dropDownList([ 'ios' => 'Ios', 'android' => 'Android', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'store_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'new' => 'New', 'sandbox' => 'Sandbox', 'pendingApproval' => 'PendingApproval', 'active' => 'Active', 'inactive' => 'Inactive', 'deleted' => 'Deleted', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'approved')->dropDownList([ 'false' => 'False', 'true' => 'True', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
