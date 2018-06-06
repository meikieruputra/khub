<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property int $id
 * @property int $kode
 * @property string $title
 * @property int $provinsi_id
 * @property string $created_date
 * @property int $created_by
 * @property string $updated_date
 * @property int $updated_by
 *
 * @property ContactOrganisasi[] $contactOrganisasis
 * @property ContactUser[] $contactUsers
 * @property Provinsi $provinsi
 * @property User $createdBy
 * @property User $updatedBy
 * @property Kecamatan[] $kecamatans
 * @property PengalamanOrganisasi[] $pengalamanOrganisasis
 * @property ProjectLocation[] $projectLocations
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'provinsi_id', 'created_by', 'updated_by'], 'integer'],
            [['title', 'provinsi_id', 'created_date', 'created_by', 'updated_date', 'updated_by'], 'required'],
            [['created_date', 'updated_date'], 'safe'],
            [['title'], 'string', 'max' => 45],
            [['kode'], 'unique'],
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
            'kode' => 'Kode Kabupaten',
            'title' => 'Nama Kabupaten',
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
        return $this->hasMany(ContactOrganisasi::className(), ['kabupaten_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactUsers()
    {
        return $this->hasMany(ContactUser::className(), ['kabupaten_id' => 'id']);
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
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['kabupaten_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengalamanOrganisasis()
    {
        return $this->hasMany(PengalamanOrganisasi::className(), ['lokasi_kabupaten_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectLocations()
    {
        return $this->hasMany(ProjectLocation::className(), ['kabupaten_id' => 'id']);
    }
}
