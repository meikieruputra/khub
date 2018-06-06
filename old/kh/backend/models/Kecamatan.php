<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property int $id
 * @property int $kode
 * @property string $title
 * @property int $kabupaten_id
 * @property int $provinsi_id
 * @property string $created_date
 * @property int $created_by
 * @property string $updated_date
 * @property int $updated_by
 *
 * @property ContactOrganisasi[] $contactOrganisasis
 * @property ContactUser[] $contactUsers
 * @property Kabupaten $kabupaten
 * @property Provinsi $provinsi
 * @property User $createdBy
 * @property User $updatedBy
 * @property PengalamanOrganisasi[] $pengalamanOrganisasis
 * @property ProjectLocation[] $projectLocations
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode',  'provinsi_id', 'created_by', 'updated_by'], 'integer'],
            [['title', 'kabupaten_id', 'provinsi_id', 'created_date', 'created_by', 'updated_date', 'updated_by'], 'required'],
            [['created_date', 'updated_date', 'kabupaten_id'], 'safe'],
            [['title'], 'string', 'max' => 45],
            [['kode'], 'unique'],
            [['kabupaten_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['kabupaten_id' => 'id']],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['provinsi_id' => 'id']],
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
            'kode' => 'Kode Kecamatan',
            'title' => 'Nama Kecamatan',
            'kabupaten_id' => 'Kabupaten',
            'provinsi_id' => 'Provinsi',
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
        return $this->hasMany(ContactOrganisasi::className(), ['kecamatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactUsers()
    {
        return $this->hasMany(ContactUser::className(), ['kecamatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'kabupaten_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'provinsi_id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengalamanOrganisasis()
    {
        return $this->hasMany(PengalamanOrganisasi::className(), ['lokasi_kecamatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectLocations()
    {
        return $this->hasMany(ProjectLocation::className(), ['kecamatan_id' => 'id']);
    }
}
