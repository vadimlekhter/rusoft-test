<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Blog;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\models\BlogTag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-tag-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'blog_id')
        ->dropDownList(Blog::find()
            ->select('title')
            ->indexBy('id')
            ->column())->label('Блог') ?>

    <?= $form->field($model, 'tag_id')
        ->dropDownList(Tag::find()
            ->select('name')
            ->indexBy('id')
            ->column())->label('Тэг') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
