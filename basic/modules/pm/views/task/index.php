<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая задача', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'task_id',
            'name',
            'project_id',
            'user_id',
            'description',
             'parent_task_id',
             //'previous_task_id',
             'start_date',
             'plan_end_date',
             'fact_end_date',
             //'employment_percentage',
             'status',
             //'complete_percentage',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
