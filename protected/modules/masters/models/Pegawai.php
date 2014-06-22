<?php

/**
 * This is the model class for table "{{pegawai}}".
 *
 * The followings are the available columns in table '{{pegawai}}':
 * @property integer $id
 * @property integer $id_departemen
 * @property string $nip
 * @property string $nama
 * @property string $jabatan
 * @property string $pendidikan
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property integer $tempat_tes
 * @property string $tgl_tes
 */
class Pegawai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pegawai}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
          'id_departemen, id_unitkerja, nip, id_jabatan, pendidikan, tempat_lahir, tgl_lahir',
          'required'),
			array('id_departemen, tempat_tes', 'numerical', 'integerOnly'=>true),
			array('nip, nama', 'length', 'max'=>30),
			array('id_jabatan, tempat_lahir', 'length', 'max'=>50),
			array('pendidikan', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_departemen, nip, nama, id_jabatan, pendidikan, tempat_lahir, tgl_lahir, tempat_tes, tgl_tes', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_departemen' => 'Id Departemen',
			'nip' => 'Nip',
			'nama' => 'Nama',
			'jabatan' => 'Jabatan',
			'pendidikan' => 'Pendidikan',
			'tempat_lahir' => 'Tempat Lahir',
			'tgl_lahir' => 'Tgl Lahir',
			'tempat_tes' => 'Tempat Tes',
			'tgl_tes' => 'Tgl Tes',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_departemen',$this->id_departemen);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('jabatan',$this->id_jabatan,true);
		$criteria->compare('pendidikan',$this->pendidikan,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}