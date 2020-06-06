<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\BlogTag;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BlogTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Блог-Тэг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-tag-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Присвоить тэг блогу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'blog_id',
                'value' => function (BlogTag $model) {
                    return $model->blog->title;
                }
            ],
            [
                'attribute' => 'tag_id',
                'value' => function (BlogTag $model) {
                    return $model->tag->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
