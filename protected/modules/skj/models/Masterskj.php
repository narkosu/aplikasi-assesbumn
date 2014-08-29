<?php

/**
 * This is the model class for table "{{masterskj}}".
 *
 * The followings are the available columns in table '{{masterskj}}':
 * @property integer $id
 * @property integer $departement_id
 * @property string $skj_name
 * @property string $status
 */
class Masterskj extends CActiveRecord
{
  const SOFT_COMPETENCE = 1;
  const HARD_COMPETENCE = 2;
  private $_type = array('0'=>'', '1'=>'SOFT','2'=>'HARD');
  /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Masterskj the static model class
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
		return '{{masterskj}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departement_id, skj_name', 'required'),
			array('departement_id,tahun,type', 'numerical', 'integerOnly'=>true),
			array('skj_name', 'length', 'max'=>255),
			array('status', 'length', 'max'=>45),
			array('tgl_selesai', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, departement_id, skj_name, status, tgl_selesai', 'safe', 'on'=>'search'),
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
			'dept'=>array(self::BELONGS_TO,'Departement','departement_id')
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
			'skj_name' => 'Skj Name',
			'tahun' => 'Tahun',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('departement_id',$this->departement_id);
		$criteria->compare('skj_name',$this->skj_name,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function getSKJType(){
    return $this->_type[$this->type];
  }
}