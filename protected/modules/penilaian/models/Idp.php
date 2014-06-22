<?php

/**
 * This is the model class for table "{{idp}}".
 *
 * The followings are the available columns in table '{{idp}}':
 * @property string $id
 * @property integer $departement_id
 * @property integer $peserta_id
 * @property integer $penilaian_id
 * @property integer $manager_id
 * @property string $periode_start
 * @property string $periode_end
 * @property string $date
 * @property string $created_at
 * @property string $status
 */
class Idp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Idp the static model class
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
		return '{{idp}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departement_id, peserta_id, penilaian_id, manager_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>10),
			array('periode_start, jabatan, unit_kerja, atasan, periode_end, date, created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, departement_id, peserta_id, penilaian_id, manager_id, periode_start, periode_end, date, created_at, status', 'safe', 'on'=>'search'),
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
			'departement_id' => 'Departement',
			'peserta_id' => 'Peserta',
			'penilaian_id' => 'Penilaian',
			'manager_id' => 'Manager',
			'periode_start' => 'Periode Start',
			'periode_end' => 'Periode End',
			'date' => 'Date',
			'created_at' => 'Created At',
			'status' => 'Status',
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
		$criteria->compare('departement_id',$this->departement_id);
		$criteria->compare('peserta_id',$this->peserta_id);
		$criteria->compare('penilaian_id',$this->penilaian_id);
		$criteria->compare('manager_id',$this->manager_id);
		$criteria->compare('periode_start',$this->periode_start,true);
		$criteria->compare('periode_end',$this->periode_end,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  
}