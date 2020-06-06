<?php

namespace app\commands;

use app\models\Author;
use app\models\Tag;
use yii\console\Controller;
use yii\console\ExitCode;

class InitController extends Controller
{
    // Пример вызова команды
    // yii init/author name

    public function actionAuthor($name)
    {
        $author = new Author();
        $author->name = $name;
        $author->save();

        $new_author_id = $author->id;

        echo 'Создан новый пользователь ' . $name . ' c ID = '. $new_author_id;
    }

    // Пример вызова команды
    // yii init/Tag name

    public function actionTag($name)
    {
        $tag = new Tag();
        $tag->name = $name;
        $tag->save();

        $new_tag_id = $tag->id;

        echo 'Создан новый тэг ' . $name . ' c ID = '. $new_tag_id;
    }
}