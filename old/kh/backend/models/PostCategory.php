<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post_category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property int $parrent_id
 * @property int $show
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Post[] $posts
 * @property PostCategory $parrent
 * @property PostCategory[] $postCategories
 * @property User $createdBy
 * @property User $updatedBy
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'description', 'show', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['id', 'parrent_id', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['show'], 'string'],
            [['name'], 'unique'],
            [['slug'], 'unique'],
            [['parrent_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['parrent_id' => 'id']],
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
            'description' => 'Description',
            'parrent_id' => 'Parrent ID',
            'show' => 'Show',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['post_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParrent()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'parrent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::className(), ['parrent_id' => 'id']);
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
