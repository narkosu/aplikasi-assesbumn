<?php

/**
 * This is the model class for table "{{provider}}".
 *
 * The followings are the available columns in table '{{provider}}':
 * @property string $id
 * @property string $nama_provider
 * @property string $alamat
 * @property string $contact_person
 * @property string $no_telp
 * @property string $jenis_service
 * @property string $jenis_perusahaan
 * @property string $keterangan
 * @property string $created_at
 * @property string $file
 */
class Provider extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Provider the static model class
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
		return '{{provider}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_provider, alamat, contact_person, no_telp, jenis_service, jenis_perusahaan, file', 'length', 'max'=>255),
			array('keterangan, created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_provider, alamat, contact_person, no_telp, jenis_service, jenis_perusahaan, keterangan, created_at, file', 'safe', 'on'=>'search'),
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
			'nama_provider' => 'Nama Provider',
			'alamat' => 'Alamat',
			'contact_person' => 'Contact Person',
			'no_telp' => 'No Telp',
			'jenis_service' => 'Jenis Service',
			'jenis_perusahaan' => 'Jenis Perusahaan',
			'keterangan' => 'Keterangan',
			'created_at' => 'Created At',
			'file' => 'File',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama_provider',$this->nama_provider,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('jenis_service',$this->jenis_service,true);
		$criteria->compare('jenis_perusahaan',$this->jenis_perusahaan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}