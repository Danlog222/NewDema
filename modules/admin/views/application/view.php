<?php

use app\models\Master;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h1><?= Html::encode($this->title) ?></h1>


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
                    
        ],
    ]) ?>

</div>
