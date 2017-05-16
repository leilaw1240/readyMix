<?php

class RoleController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    public function init() {
        if (empty(Yii::app()->session['userdata']['user_id'])) {
            $this->redirect($this->createUrl('admin/index'));
        }
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
        $model = new UserRoles;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (!empty($_POST)) {
            extract($_POST);
            if(empty($permissions)){
               unset($_POST['permissions']);
            }
            $model->attributes = $_POST;
            $model->created_by = Yii::app()->session['userdata']['user_id'];
            $model->created_date = date('Y-m-d H:i:s');

            if ($model->save()) {
                $this->logactivity(array('source_id'=>$model->id,'module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]));
                $this->redirect(array('index'));
            }
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
//                echo $id;exit;
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (!empty($_POST)) {
            $model->attributes = $_POST;
            $model->updated_by = Yii::app()->session['userdata']['user_id'];
            $model->updated_date = date('Y-m-d H:i:s');
            if ($model->save()) {
                $this->logactivity(array('source_id'=>$model->id,'module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]));
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->status = 2;
        $this->save(false);

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->logactivity(array('source_id'=>$model->id,'module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]));
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        if (!empty($_GET['notification_id'])) {
            $this->UpdateNotification($_GET['notification_id']);
        }
        $roles = UserRoles::model()->findAll(array('condition' => 'id != 1'));
        $this->render('index', array(
            'roles' => $roles,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UserRoles the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UserRoles::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UserRoles $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-roles-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPermissions($id) {

        $modules = LookUp::model()->findAll(array('condition' => 'status = 1'));
        $model = new Users();
        $data['model'] = $model;
        $data['modules'] = $modules;
        $permissions = UserRoles::model()->findByPk($id);
        $data['permissions'] = serialize(array());
        if (!empty($permissions->permissions)) {
            $data['permissions'] = $permissions->permissions;
        }
        if (!empty($_POST)) {
            $permissions->permissions = serialize($_POST['permissions']);
            $permissions->save();
            $this->redirect(array('index'));
        }
        $this->render('permissions', $data);
    }

}
