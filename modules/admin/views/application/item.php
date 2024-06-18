<?php

use app\models\Master;
use app\models\Status;
use app\models\User;
use yii\bootstrap5\Html;
?>
<div class="card" style="width: 18rem;">
  <div class="card-header">
   <h5>Номер заявки: <?= Html::encode($model->id)?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Описание: <?= Html::encode($model->description)?> </li>
    <li class="list-group-item">Статус заявки: <?= Html::encode(Status::getStatus()[$model->status_id])?></li>   
    <li class="list-group-item">Дата записи: <?= Html::encode(Yii::$app->formatter->asDate($model->date,'php:Y-m-d H:i:s'))?></li>
    <li class="list-group-item">Дата создания: <?= Html::encode(Yii::$app->formatter->asDate($model->created_at,'php:Y-m-d H:i:s'))?></li>
    <li class="list-group-item">Мастер: <?= Html::encode(Master::getMaster()[$model->master_id])?> </li>
    <li class="list-group-item">Пользователь: <?= Html::encode(User::findOne($model->user_id)->full_name)?> </li>
    <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-primary m-1']) ?>
    <?= $model->status_id == Status::getStatusId('Новая')
    ?Html::a('Выполнить', ['done', 'id' => $model->id], ['class' => 'btn btn-outline-success m-1']) : '' ?>
      <?= $model->status_id == Status::getStatusId('Новая')
    ?Html::a('Отменить', ['cancel', 'id' => $model->id], ['class' => 'btn btn-outline-danger m-1']) : '' ?>
  </ul>
</div>