<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */

$this->title = 'Редактировать тэг: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тэги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
