<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\PostCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\PostCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parrent_id')->dropDownList(
        ArrayHelper::map(PostCategory::find()->all(), 
            'id', 'title'),
            ['prompt' =>'Select Post Category']
            ) 
    ?>

    <?= $form->field($model, 'show')->dropDownList(['publish'=>'Publish','unpublish'=>'Unpublish', ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
