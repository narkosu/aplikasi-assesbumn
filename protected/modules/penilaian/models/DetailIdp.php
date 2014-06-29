<?php

/**
 * This is the model class for table "{{detail_idp}}".
 *
 * The followings are the available columns in table '{{detail_idp}}':
 * @property string $id
 * @property integer $idp_id
 * @property integer $kompetensi_id
 * @property integer $level_sp_id
 * @property integer $leveldetail_sp_id
 * @property string $timeframe
 * @property integer $tujuan
 * @property string $bukti
 * @property integer $status
 * @property string $approve_date
 */
class DetailIdp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetailIdp the static model class
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
		return '{{detail_idp}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idp_id, approved_by, kompetensi_id, level_sp_id, leveldetail_sp_id, tujuan, status', 'numerical', 'integerOnly'=>true),
			array('bukti', 'file', 'allowEmpty' => true, 'types'=>'pdf, xls, xlsx, doc, docx, jpg, jpeg, png'),
      array('timeframe, approved_by, approve_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idp_id, kompetensi_id, level_sp_id, leveldetail_sp_id, timeframe, tujuan, bukti, status, approve_date', 'safe', 'on'=>'search'),
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
        'jenispengembangan'=>array(self::BELONGS_TO,'Jenispengembangan','jenispengembangan_id'),
        'leveldetail'=>array(self::BELONGS_TO,'LevelSaranpengembanganDetail','leveldetail_sp_id'),
        'leveldetailhard'=>array(self::BELONGS_TO,'LevelSaranpengembanganDetailHard','leveldetail_sp_id'),
        'user'=>array(self::BELONGS_TO,'User','approved_by'),
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
			'kompetensi_id' => 'Kompetensi',
			'level_sp_id' => 'Level Sp',
			'leveldetail_sp_id' => 'Leveldetail Sp',
			'timeframe' => 'Timeframe',
			'tujuan' => 'Tujuan',
			'bukti' => 'Bukti',
			'status' => 'Status',
			'approve_date' => 'Approve Date',
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
		$criteria->compare('kompetensi_id',$this->kompetensi_id);
		$criteria->compare('level_sp_id',$this->level_sp_id);
		$criteria->compare('leveldetail_sp_id',$this->leveldetail_sp_id);
		$criteria->compare('timeframe',$this->timeframe,true);
		$criteria->compare('tujuan',$this->tujuan);
		$criteria->compare('bukti',$this->bukti,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('approve_date',$this->approve_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}