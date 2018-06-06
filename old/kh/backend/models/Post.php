<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $post_category_id
 * @property string $description
 * @property string $future_image
 * @property string $content
 * @property int $tag
 * @property int $show
 * @property string $created_date
 * @property int $created_by
 * @property string $updated_date
 * @property int $updated_by
 *
 * @property PostCategory $postCategory
 * @property Tag $tag0
 * @property User $createdBy
 * @property User $updatedBy
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'post_category_id', 'description', 'content', 'show', 'created_date', 'created_by', 'updated_date', 'updated_by'], 'required'],
            [['id', 'post_category_id', 'tag', 'show', 'created_by', 'updated_by'], 'integer'],
            [['description', 'content'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['title', 'slug', 'future_image'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['post_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['post_category_id' => 'id']],
            [['tag'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'post_category_id' => 'Post Category ID',
            'description' => 'Description',
            'future_image' => 'Future Image',
            'content' => 'Content',
            'tag' => 'Tag',
            'show' => 'Show',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategory()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'post_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag0()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
