<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

//$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

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
            'category_id',
            'title',
            'slug',
            'lead_photo',
            'lead_text:ntext',
            'content:ntext',
            'meta_description',
            'created_at',
            'createdBy.username',
            'updated_at',
            'updatedBy.username',
            'status_id',
        ],
    ]) ?>

</div>
