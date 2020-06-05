<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogTag */

$this->title = 'Редактировать тэг блога: ' . $model->blog_id;
$this->params['breadcrumbs'][] = ['label' => 'Блог-Тэг', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->blog_id, 'url' => ['view', 'blog_id' => $model->blog_id, 'tag_id' => $model->tag_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="blog-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
