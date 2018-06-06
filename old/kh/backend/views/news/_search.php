<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'lead_photo') ?>

    <?= $form->field($model, 'lead_text') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?= echo $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= echo $form->field($model, 'created_by') ?>

    <?= echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
