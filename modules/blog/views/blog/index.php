<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Blog;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Блоги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новый блог', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
            [
                'attribute' => 'title',
                'label' => 'Название',
            ],
            [
                'label' => 'Тэги',
                'value' => function (Blog $model) {
                    $arr = $model->getTags()->select('name')->column();
                    return implode(', ', $arr);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
