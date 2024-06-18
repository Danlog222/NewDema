<?php

use app\models\Application;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\ApplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Административная панель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление мастерами', ['/stosto-panel/master'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= $dataProvider->sort->link('id') . ' | ' . $dataProvider->sort->link('master_id') . ' | ' . $dataProvider->sort->link('created_at') . ' | ' . $dataProvider->sort->link('date') . ' | ' . $dataProvider->sort->link('status_id')  . ' | ' . $dataProvider->sort->link('user_id'); ?>
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'col-md-3 d-flex justify-content-center mb-3'],
        'pager' => [
            'class' => LinkPager::class,
        ],
        'layout' => '<div class="row m-auto">{items}</div>{pager}',
        'itemView' => 'item',
    ]) ?>

    <?php Pjax::end(); ?>

</div>
