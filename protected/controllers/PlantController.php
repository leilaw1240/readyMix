<?php

class PlantController extends Controller {

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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Plants;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Plants'])) {
            $model->attributes = $_POST['Plants'];
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
        echo $id;exit;
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Plants'])) {
            $model->attributes = $_POST['Plants'];
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

        $model = new Plants();
        $c = new CDbCriteria();

        $count = Plants::model()->count($c);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($c);
        $c->select = 't.*,t1.first_name,t1.last_name';
        $c->join = 'join tbl_users as t1 on t1.id = t.supervisor_id';
        $c->order = 't.created_date desc';

        $plants = Plants::model()->findAll($c);
        $this->render('index', array(
            'plants' => $plants,
            'pages' => $pages,
            'model' => $model
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Plants('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Plants']))
            $model->attributes = $_GET['Plants'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Plants the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Plants::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Plants $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'plants-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
