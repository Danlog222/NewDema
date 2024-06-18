<?php

use app\models\Master;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */

$time = [
    '08:00:00' => '08:00',
    '09:00:00' => '09:00',
    '10:00:00' => '10:00',
    '11:00:00' => '11:00',
    '12:00:00' => '12:00',
    '13:00:00' => '13:00',
    '14:00:00' => '14:00',
    '15:00:00' => '15:00',
    '16:00:00' => '16:00',
    '17:00:00' => '17:00',
    '18:00:00' => '18:00',
    ];
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_str')->textInput([
        'type' => 'date',
        'min' => date('Y-m-d')
    ]) ?>

    <?= $form->field($model, 'time')->dropDownList($time,['prompt' => 'Выберите час'])?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'master_id')->dropDownList(Master::getMaster(),['prompt' => 'Выберите мастера']) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
