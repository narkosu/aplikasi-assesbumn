<?php

/**
 * This is the model class for table "{{level_saranpengembangan}}".
 *
 * The followings are the available columns in table '{{level_saranpengembangan}}':
 * @property integer $id
 * @property integer $departemen_id
 * @property integer $kompetensi_id
 * @property integer $jenispengembangan_id
 * @property integer $level
 * @property string $keterangan
 */
class LevelSaranpengembanganHard extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LevelSaranpengembangan the static model class
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
		return '{{level_saranpengembangan_hard}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departemen_id, kompetensi_id, jenispengembangan_id', 'required'),
			array('departemen_id, kompetensi_id, jenispengembangan_id, level', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, departemen_id, kompetensi_id, jenispengembangan_id, level, keterangan', 'safe', 'on'=>'search'),
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
        'dept'=>array(self::BELONGS_TO,'Departement','departemen_id'),
        'kompetensi'=>array(self::BELONGS_TO,'KompetensiHard','kompetensi_id'),
        'detail'=>array(self::HAS_MANY, 'LevelSaranpengembanganDetailHard', 'id_saranpengembangan'),
        'jenpeng'=>array(self::BELONGS_TO,'Jenispengembangan','jenispengembangan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'departemen_id' => 'Departemen',
			'kompetensi_id' => 'Kompetensi',
			'jenispengembangan_id' => 'Jenispengembangan',
			'level' => 'Level',
			'keterangan' => 'Keterangan',
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
		$criteria->compare('departemen_id',$this->departemen_id);
		$criteria->compare('kompetensi_id',$this->kompetensi_id);
		$criteria->compare('jenispengembangan_id',$this->jenispengembangan_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  /**
	 * Retrieves a list of detail models based on the current search/filter conditions.
	 * @return record
	 */
  public function detail($deptId,$kompId,$jenpengId,$level){
   
    $xxs =  $this->find('departemen_id = :depid And 
                kompetensi_id = :kip And
                jenispengembangan_id = :jid And
                level = :lev
                ', array(':depid'=>$deptId,
                    ':kip'=>$kompId,
                    ':jid'=>$jenpengId,
                    ':lev'=>$level
                    )
                );
    //echo count($xxs->detail);
    return $xxs;
  }
  
  public function getSaranPengembangan($deptId,$kompId,$jpid){
   
    return $this->findAll('departemen_id = :depid And 
                kompetensi_id = :kip And
                jenispengembangan_id = :jid
                ', array(':depid'=>$deptId,
                    ':kip'=>$kompId,
                    ':jid'=>$jpid
                    )
                );
    
  }
  
  public function findLevel($jenpengId,$level){
    
  }
  
  public function getsaranarray($depid, $kompetensi_id){
		
		$r = $this->findAll('departemen_id = :deptid AND kompetensi_id = :kid',
            array(':deptid'=>$depid, ':kid'=>$kompetensi_id));
    //echo $depid.' '.$kompetensi_id;
    $return = array();
		foreach ($r as $row){
			$return[$kompetensi_id][$row->jenispengembangan_id][$row->id]['jenis_pengembangan'] = $row->jenpeng->nama_pengembangan;
			$return[$kompetensi_id][$row->jenispengembangan_id][$row->id]['level'] = $row->level;
      if ( !empty($row->detail))
      foreach ($row->detail as $detail){
        $return[$kompetensi_id][$row->jenispengembangan_id][$row->id]['saran_pengembangan'][$detail->id] = $detail->keterangan;
      }
		}
		//print_r($return);
		return $return;
	}
  
  public function findDetail(){
    return $this->detail($this->departemen_id,
                      $this->kompetensi_id,
                      $this->jenispengembangan_id,
                      $this->level);
  }
}