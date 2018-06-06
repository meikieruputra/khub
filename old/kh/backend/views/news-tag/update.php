<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsTag */

$this->title = 'Update News Tag: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'News Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
