<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogTag */

$this->title = 'Присвоить тэг блогу';
$this->params['breadcrumbs'][] = ['label' => 'Блог-Тэг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
