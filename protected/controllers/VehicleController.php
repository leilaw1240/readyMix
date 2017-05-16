<?php

class VehicleController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    
     public function init() {
        if (empty(Yii::app()->session['userdata']['user_id'])) {
            $this->redirect($this->createUrl('admin/index'));
        }
        $this->db = new Clients();
         
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Vehicles;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Vehicles'])) {
            $model->attributes = $_POST['Vehicles'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Vehicles'])) {
            $model->attributes = $_POST['Vehicles'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        if (!empty($_GET['notification_id'])) {
            $this->UpdateNotification($_GET['notification_id']);
        }
        $model = new Vehicles();
        $c = new CDbCriteria();

        $count = Vehicles::model()->count($c);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($c);
        $c->select = 't.*';
        $c->order = 't.created_date desc';

        $vehicles = Vehicles::model()->findAll($c);
        $this->render('index', array(
            'vehicles' => $vehicles,
            'pages' => $pages,
            'model' => $model
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Vehicles('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Vehicles']))
            $model->attributes = $_GET['Vehicles'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Vehicles the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Vehicles::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Vehicles $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vehicles-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
