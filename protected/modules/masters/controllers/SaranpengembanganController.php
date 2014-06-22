<?php

class SaranpengembanganController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/main';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','LoadProcessing'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

  public function actionLoadProcessing(){
		//print_r($_GET);
		$DEFAULTCOL = array('id','departemen_id','kompetensi_id','jenis_pengembangan_id','nama_saran');
		
    $criteria=new CDbCriteria;
		$criteria->compare('departemen_id',$this->module->current_departement_id);
		
		if ( !empty($_GET['sSearch'])){
			$criteria->compare('nama_saran',$_GET['sSearch'],true,'AND',TRUE);
		}
		
		if ( !empty($_GET['iSortCol_0'])){
			 $criteria->order = $DEFAULTCOL[$_GET['iSortCol_0']].' '.$_GET['sSortDir_0'];
			
		}
		
		$Count = Saranpengembangan::model()->count($criteria);
		
		$criteria->offset = $_GET['iDisplayStart'];
		
		$criteria->limit = $_GET['iDisplayLength'];
		
		$items = Saranpengembangan::model()
			->findAll($criteria);
			
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $Count,
			"iTotalDisplayRecords" => $Count,
			"aaData" => array()
		);

		foreach ($items as $i=>$saran_pengembangan){
			unset($row);
			
			foreach ($saran_pengembangan as $field => $vale){
				
				if ( $field == 'departemen_id') {
					$row[$field] = $saran_pengembangan->dept->name;
				}else 
				
          if ( $field == 'kompetensi_id') {
					$row[$field] = $saran_pengembangan->kompetensi->name;
					
				} else if ( $field == 'jenispengembangan_id') {
					$row[$field] = $saran_pengembangan->jenpeng->nama_pengembangan;
					
        } else {
					$row[$field] = $vale;
				}
        $row['level'] = '';
			}
			
			$row['ids'] = $saran_pengembangan->id;//for else
			$output['aaData'][] = $row;
		}
		
		echo json_encode($output);
	}
  
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Saranpengembangan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Saranpengembangan']))
		{
			$model->attributes=$_POST['Saranpengembangan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
        'params'=> array()
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Saranpengembangan']))
		{
			$model->attributes=$_POST['Saranpengembangan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
        'params'=> array()
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
    $criteria=new CDbCriteria;
		$criteria->compare('departemen_id',$this->module->current_departement_id);
            
    $model = Saranpengembangan::model()
			->findAll($criteria);
		
		$this->render('index',array(
			'model'=>$model,
      'params'=> array()
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Saranpengembangan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Saranpengembangan']))
			$model->attributes=$_GET['Saranpengembangan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Saranpengembangan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='saranpengembangan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
