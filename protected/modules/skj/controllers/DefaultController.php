<?php

class DefaultController extends Controller
{
	public $layout = '//layouts/main';
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}	

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('index','LoadProcessing'),
					'users' => array('@'),
					),
				array('allow',
					'actions'=>array('admin','delete', 'view', 'slip', 'invoice'),
					'users' => array('admin'),
					),
				array('deny',  // deny all other users
						'users'=>array('*'),
						),
				);
	}
	
	public function actionIndex()
	{
		//echo Yii::app()->request->getQuery('user');
		/*$model=new Masterskj('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Masterskj']))
			$model->attributes=$_GET['Masterskj'];
		*/	
		$this->render('home',array(
			//'model'=>$model,
		));
		
		
	}
	
	public function actionLoadProcessing(){
		$criteria=new CDbCriteria;
		if ($this->module->current_departement_id)
			$criteria->compare('departement_id',$this->module->current_departement_id);
		
		$Count = Masterskj::model()->count($criteria);
		
		//$criteria->with = array('dept');
		$criteria->offset = $_GET['iDisplayStart'];
		
		$criteria->limit = $_GET['iDisplayLength'];
		
		
		$items = Masterskj::model()
			->findAll($criteria);
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $Count,
			"iTotalDisplayRecords" => $Count,
			"aaData" => array()
		);

		foreach ($items as $i=>$iskj){
			unset($row);
			
			foreach ($iskj as $field => $vale){
				$row[] = $vale;
			}
			$row[] = $iskj->id;//for else
			$row['departement'] = $iskj->dept->name;//for else
			$row['type'] = $iskj->getSKJType();//for else
			$output['aaData'][] = $row;
		}
		
		//print_r($_GET);
		echo json_encode($output);
	}
	
	
}