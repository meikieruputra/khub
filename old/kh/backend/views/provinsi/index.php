<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProvinsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinsi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provinsi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Provinsi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'kode',
            'title',
            'created_date',
            [
                'attribute' => 'created_by',
                'value' => 'createdBy.username',
            ],
            'updated_date',
            [
                'attribute' => 'updated_by',
                'value' => 'updatedBy.username',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
