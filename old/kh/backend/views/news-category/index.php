<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'slug',
            'meta_description',
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

            ['class' => 'yii\grid\ActionColumn', 'header' => 'Actions'],
        ],
    ]); ?>
</div>
