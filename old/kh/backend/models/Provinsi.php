<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property int $id
 * @property int $kode
 * @property string $title
 * @property string $created_date
 * @property int $created_by
 * @property string $updated_date
 * @property int $updated_by
 *
 * @property ContactOrganisasi[] $contactOrganisasis
 * @property ContactUser[] $contactUsers
 * @property Kabupaten[] $kabupatens
 * @property Kecamatan[] $kecamatans
 * @property PengalamanOrganisasi[] $pengalamanOrganisasis
 * @property ProjectLocation[] $projectLocations
 * @property User $createdBy
 * @property User $updatedBy
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'created_by', 'updated_by'], 'integer'],
            [['title', 'created_date', 'created_by', 'updated_date', 'updated_by'], 'required'],
            [['created_date', 'updated_date'], 'safe'],
            [['title'], 'string', 'max' => 45],
            //[['kode'], 'unique'],
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
            'kode' => 'Kode Provinsi',
            'title' => 'Nama Provinsi',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactOrganisasis()
    {
        return $this->hasMany(ContactOrganisasi::className(), ['provinsi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactUsers()
    {
        return $this->hasMany(ContactUser::className(), ['provinsi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['provinsi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['provinsi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengalamanOrganisasis()
    {
        return $this->hasMany(PengalamanOrganisasi::className(), ['lokasi_provinsi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectLocations()
    {
        return $this->hasMany(ProjectLocation::className(), ['provinsi_id' => 'id']);
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
