<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Update';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'slug',
            //'lead_photo',
            'lead_text:ntext',
            'category_id',
            //'content:ntext',
            //'meta_description',
            'created_at',
            [
                'attribute' => 'created_by',
                'value' => 'createdBy.username',
            ],
            'updated_at',
            [
                'attribute' => 'updated_by',
                'value' => 'updatedBy.username',
            ],
            'status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
