<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProvinsiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provinsi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'created_date') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= echo $form->field($model, 'updated_date') ?>

    <?= echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
