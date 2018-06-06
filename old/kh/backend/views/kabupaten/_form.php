<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Provinsi;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provinsi_id')->dropDownList(
        ArrayHelper::map(Provinsi::find()->all(),'id', 'title'),
            ['prompt'=>'--- Pilih Provinsi ----']
        ) ?>

    <?= $form->field($model, 'kode')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
