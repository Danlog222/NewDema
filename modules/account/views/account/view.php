<?php

use app\models\Master;
use app\models\Status;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            [
                'attribute' => 'id',
                'value' => Html::encode($model->id),
            ],
            [
                'attribute' => 'description',
                'value' => Html::encode($model->description),
            ],
            [
                'attribute' => 'status_id',
                'value' => Html::encode(Status::getStatus()[$model->status_id]),
            ],
            [
                'attribute' => 'date',
                'value' => Html::encode(Yii::$app->formatter->asDate($model->date,'php:Y-m-d H:i:s')),
            ],
            [
                'attribute' => 'created_at',
                'value' => Html::encode(Yii::$app->formatter->asDate($model->created_at,'php:Y-m-d H:i:s')),
            ],
            [
                'attribute' => 'master_id',
                'value' => Html::encode(Master::getMaster()[$model->master_id]),
            ],
            [
                'attribute' => 'user_id',
                'value' => Html::encode(User::findOne([$model->user_id])->full_name),
            ],
           
            
        ],
    ]) ?>

</div>
