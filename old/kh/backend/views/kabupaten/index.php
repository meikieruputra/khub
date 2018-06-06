<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\KabupatenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupaten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kabupaten', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'provinsi_id',
                'value' => 'provinsi.title',
            ],
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
