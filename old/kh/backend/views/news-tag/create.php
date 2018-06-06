<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NewsTag */

$this->title = 'Create News Tag';
$this->params['breadcrumbs'][] = ['label' => 'News Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
