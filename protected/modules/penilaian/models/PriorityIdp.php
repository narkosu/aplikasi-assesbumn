<?php

/**
 * This is the model class for table "{{priority_idp}}".
 *
 * The followings are the available columns in table '{{priority_idp}}':
 * @property string $id
 * @property integer $idp_id
 * @property integer $departement_id
 * @property integer $kompetensi_id
 * @property integer $current_level
 * @property integer $next_level
 */
class PriorityIdp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PriorityIdp the static model class
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
		return '{{priority_idp}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idp_id, departement_id, kompetensi_id, jenispengembangan_id, current_level, next_level', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idp_id, departement_id, kompetensi_id, current_level, next_level', 'safe', 'on'=>'search'),
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
        'idp'=>array(self::BELONGS_TO,'Idp','idp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idp_id' => 'Idp',
			'departement_id' => 'Departement',
			'kompetensi_id' => 'Kompetensi',
			'current_level' => 'Current Level',
			'next_level' => 'Next Level',
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
		$criteria->compare('idp_id',$this->idp_id);
		$criteria->compare('departement_id',$this->departement_id);
		$criteria->compare('kompetensi_id',$this->kompetensi_id);
		$criteria->compare('current_level',$this->current_level);
		$criteria->compare('next_level',$this->next_level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}