<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Blog;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Блоги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот блог?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'created_at',
                'label' => 'Создан',
                'format' => 'datetime'
            ],
            [
                'attribute' => 'created_by',
                'label' => 'Автор',
                'value' => function (Blog $model) {
                    return $model->createdBy->name;
                }
            ],
//            [
//                'attribute' => 'published',
//                'label' => 'Опубликовано',
//                'value' => function (Blog $model) {
//                    return Blog::STATUS_DESCR[$model->published];
//                }
//            ],
            [
                'attribute' => 'title',
                'label' => 'Название',
            ],
            [
                'attribute' => 'text',
                'label' => 'Текст',
                'format' => 'raw',
            ],
            [
                'label' => 'Тэги',
                'value' => function (Blog $model) {
                    $arr = $model->getTags()->select('name')->column();
                    return implode(', ', $arr);
                }
            ],
        ],
    ]) ?>
    <?= Html::a('Вернуться', ['index'], ['class' => 'btn btn-success']) ?>

</div>
