<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Master $model */

$this->title = 'Добавить мастера';
$this->params['breadcrumbs'][] = ['label' => 'Управление мастерами', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
