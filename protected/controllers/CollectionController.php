<?php

class CollectionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout = '//layouts/column2';

    public function init() {
        if (empty(Yii::app()->session['userdata']['user_id'])) {
            $this->redirect($this->createUrl('admin/index'));
	}
        $this->db = new Schedules();

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SchedulePayments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SchedulePayments']))
		{
			$model->attributes=$_POST['SchedulePayments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SchedulePayments']))
		{
			$model->attributes=$_POST['SchedulePayments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
    public function actionIndex() {
        if (!empty($_GET['notification_id'])) {
            $this->UpdateNotification($_GET['notification_id']);
	}
        $c = new CDbCriteria();
        $c->select = 't.schedule_id ,SUM(t.paid_amount) as paid_amount ,t1.estimated_amount,t3.client_name,t3.mobile_1';
        $c->join = 'join tbl_schedules t1 on t1.id = t.schedule_id ';
        $c->join .= ' join tbl_client_sites t2 on t2.id = t1.site_id ';
        $c->join .= ' join tbl_clients t3 on t3.id = t2.client_id ';
        $c->condition = 't1.status = 3';
//        $c->order = 't.created_date desc';

        $c->group = 't.schedule_id';

        $data['reports'] = SchedulePayments::model()->findAll($c);
        
//        echo '<pre>'; print_r($data);exit;
        
        $this->render('index', $data);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SchedulePayments the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SchedulePayments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SchedulePayments $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='schedule-payments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
