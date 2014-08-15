<?php

class ProviderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
				'actions'=>array('create','update','loadfile'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionLoadfile($filename)
	{
		if ( empty($filename) ){
        $this->render('download404');
        Yii::app()->end();
    }
          
    $name	= $filename;	
    $upload_path = Yii::getPathOfAlias('webroot')."/files/provider";  

    if( file_exists( $upload_path.'/'.$name ) ){
        Yii::app()->getRequest()->sendFile( $name , file_get_contents( $upload_path.'/'.$name ) );
    }
    else{
        $this->render('download404');
    }	
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
    $folder = Yii::getPathOfAlias('webroot')."/files/provider"; 
    if ( !file_exists($folder)){
        @mkdir($folder);
    }
    
		$model=new Provider;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Provider']))
		{
			$model->attributes=$_POST['Provider'];
      
			if($model->save()){
          if ( !empty($_FILES['Provider']['name']['file']) ) {
            $model->file = CUploadedFile::getInstance($model, 'file');                
            $time = time();
            $newfilename = 'provider'.'_'.$time.'.'.$model->file->getExtensionName();
            $extension = $model->file->getExtensionName();

            $model->file->saveAs( $folder . '/' . $newfilename ); 
            $model->file = $newfilename;
            $model->save();
          }
          
            $this->redirect(array('index'));
      }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$folder = Yii::getPathOfAlias('webroot')."/files/provider"; 
    if ( !file_exists($folder) ){
        @mkdir($folder);
    }
    $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Provider']))
		{
			
        $model->attributes=$_POST['Provider'];
			if($model->save()) {
         
				if ( !empty($_FILES['Provider']['name']['file']) ) {
            $model->file = CUploadedFile::getInstance($model, 'file');
            $time = time();
            $newfilename = 'provider'.'_'. $time .'.'.$model->file->getExtensionName();
            $extension = $model->file->getExtensionName();

            $model->file->saveAs( $folder . '/' . $newfilename ); 
            $model->file = $newfilename;
            $model->save();
          }
          $this->redirect(array('index'));
      }
		}

		$this->render('update',array(
			'model'=>$model,
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
		$model=new Provider('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Provider']))
			$model->attributes=$_GET['Provider'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Provider('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Provider']))
			$model->attributes=$_GET['Provider'];

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
		$model=Provider::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='provider-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
