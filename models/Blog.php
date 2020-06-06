<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $published
 * @property string|null $title
 * @property string|null $text
 *
 * @property Author $createdBy
 * @property BlogTag[] $blogTags
 */
class Blog extends \yii\db\ActiveRecord
{

    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 0;

    const STATUS_LABELS = [
        self::STATUS_PUBLISHED => 'Опубликовать',
        self::STATUS_UNPUBLISHED => 'Не публиковать',
    ];

    const STATUS_DESCR = [
        self::STATUS_PUBLISHED => 'Да',
        self::STATUS_UNPUBLISHED => 'Нет',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['created_by', 'published'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Создан',
            'created_by' => 'Автор',
            'published' => 'Опубликовано',
            'title' => 'Название',
            'text' => 'Текст',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AuthorQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Author::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[BlogTags]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BlogTagQuery
     */
    public function getBlogTags()
    {
        return $this->hasMany(BlogTag::className(), ['blog_id' => 'id']);
    }

public function getTags ()
{
    return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
        ->viaTable('blog_tag', ['blog_id' => 'id']);
}


    /**
     * {@inheritdoc}
     * @return \app\models\query\BlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\BlogQuery(get_called_class());
    }
}
