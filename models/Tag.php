<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property BlogTag[] $blogTags
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
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
     * Gets query for [[BlogTags]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BlogTagQuery
     */
    public function getBlogTags()
    {
        return $this->hasMany(BlogTag::className(), ['tag_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TagQuery(get_called_class());
    }
}
