<?php

use app\models\Master;
use app\models\Status;
use yii\bootstrap5\Html;
?>
<div class="card" style="width: 18rem;">
  <div class="card-header">
   Номер заявки: <?= Html::encode($model->id)?>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Описание: <?= Html::encode($model->description)?> </li>
    <li class="list-group-item">Статус заявки: <?= Html::encode(Status::getStatus()[$model->status_id])?></li>   
    <li class="list-group-item">Дата записи: <?= Html::encode(Yii::$app->formatter->asDate($model->date,'php:Y-m-d H:i:s'))?></li>
    <li class="list-group-item">Дата создания: <?= Html::encode(Yii::$app->formatter->asDate($model->created_at,'php:Y-m-d H:i:s'))?></li>
    <li class="list-group-item">Мастер: <?= Html::encode(Master::getMaster()[$model->master_id])?> </li>
    <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-primary m-1']) ?>
    <?=   $model->status_id == 1
    ? Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger m-1',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) :''?>
  </ul>
</div>