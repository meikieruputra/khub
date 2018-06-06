<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Provinsi;
use backend\models\Kabupaten;

/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kecamatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provinsi_id')->dropDownList(
        ArrayHelper::map(Provinsi::find()->all(),'id','title'),
        [
            'prompt'=>'--- Pilih Provinsi ---',
            'onchange'=>'
                $.post("index.php?r=kabupaten/lists&id='.'"+$(this).val(),function(data)
                { $("select#kecamatan-kabupaten_id" ).html(data);
            });'
        ]
    ); ?>

    <?= $form->field($model, 'kabupaten_id')->dropDownList(
        ArrayHelper::map(Kabupaten::find()->all(),'id','title'),
        [
            'prompt'=>'--- Pilih Kabupaten ---',
        ]
    ) ?>    

    <?= $form->field($model, 'kode')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
