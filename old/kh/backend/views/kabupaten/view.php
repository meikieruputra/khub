<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kabupaten', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kode',
            'title',
            'provinsi.title',
            'created_date',
            'createdBy.username',
            'updated_date',
            'updatedBy.username',
        ],
    ]) ?>

</div>
