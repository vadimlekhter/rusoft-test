<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Blog[] $blogs
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Blogs]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BlogQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['created_by' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\AuthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AuthorQuery(get_called_class());
    }
}
