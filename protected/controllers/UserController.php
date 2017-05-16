<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $roles = array();

    public function init() {

        if (empty(Yii::app()->session['userdata']['user_id'])) {
            $this->redirect($this->createUrl('admin/index'));
        }
        $this->roles = UserRoles::model()->findAll(array('condition' => 'id != 1 and status = 1'));
        $this->db = new Users();
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
        $this->is_admin_logged();
        $model = new Users;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (!empty($_POST)) {
            $check = Users::model()->findByAttributes(array('email' => $_POST['email']));
            if (empty($check)) {
                $model->attributes = $_POST;
                $model->created_by = Yii::app()->session['userdata']['user_id'];
                $model->created_date = date('Y-m-d H:i:s');
                $password = 'admin';
                $model->password = md5($password);
                if ($model->save()) {
                    if ($model->status == 1) {
//                        $mcontent = array('username' => $model->first_name . ' ' . $model->last_name, 'password' => $password, 'activate_link' => '');
//                        $mail_content = $this->renderPartial("//emailtemplate/registration", $mcontent, true);
//                        $this->sendMail(Yii::app()->params['adminEmail'], $model->email, 'User | Registration', $mail_content);
                    }
                    $activity_data = array('module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]);
//                    print_r($activity_data);exit;
                    $this->logactivity(array('source_id' => $model->id, 'module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]));
                    $this->redirect(array('index'));
                }
            } else {

                $model->errorMessage = 'User Already Existed';
            }
        }

        $this->render('create', array(
            'model' => $model, 'roles' => $this->roles
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->is_admin_logged();
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (!empty($_POST)) {
            $model->attributes = $_POST;
            $model->updated_by = Yii::app()->session['userdata']['user_id'];
            $model->updated_date = date('Y-m-d H:i:s');
            if ($model->save()) {
                Yii::app()->user->setFlash('message', 'User Deleted Sucessfully');
                $this->logactivity(array('source_id' => $model->id, 'module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]));
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
            'model' => $model, 'roles' => $this->roles
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->is_admin_logged();
        $model = $this->loadModel($id);
        $model->status = 2;
        $model->save(false);
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->logactivity(array('source_id' => $id, 'module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]));
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
        $model = new Users();
        $c = new CDbCriteria();
        $c->condition = 'status != 2';

        $count = Users::model()->count($c);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($c);
        $c->select = 't.*,t1.role_name,t2.schedule_count';
        $c->join = 'join tbl_user_roles as t1 on t1.id = t.role_id and t.role_id !=1';
        $c->join .= '  left join (SELECT created_by, count(id) as schedule_count FROM `tbl_schedules` GROUP by created_by) t2 on t2.created_by = t.id';
        $c->condition = 't.status != 2';
        $c->order = 't.created_date desc';

        $users = Users::model()->findAll($c);
        $this->render('index', array(
            'users' => $users,
            'pages' => $pages,
            'model' => $model
        ));
    }

    public function actionProfile() {
        $this->is_user_logged();
        $this->layout = 'column4';
        $this->menu_class = 'page page-template-default logged-in admin-bar woocommerce-account woocommerce-page woocommerce-edit-account page-login listable customize-support';
        $countries = Countries::model()->findAll();
        $userprofile = Users::model()->findByPk(Yii::app()->session['login']['user_id']);
        if ($_POST) {
//            echo '<pre>';
//            print_r($_POST);
//            print_r($_FILES);
//            exit;
            if ($userprofile) {
                $_POST['first_name'] = $_POST['billing_first_name'];
                $_POST['last_name'] = $_POST['billing_last_name'];
                $_POST['phone_number'] = $_POST['billing_phone'];
                unset($_POST['billing_first_name']);
                unset($_POST['billing_last_name']);
                unset($_POST['billing_phone']);
                $userprofile->attributes = $_POST;
                $userprofile->updated_by = Yii::app()->session['login']['user_id'];
                $userprofile->updated_date = date('Y-m-d H:i:s');
                $profile_pic = Yii::app()->baseUrl . '/uploads/profile/no_profile_image.png';
                if (!empty($userprofile->profile_image)) {
                    $profile_pic = Yii::app()->baseUrl . '/uploads/profile/' . $userprofile->profile_image;
                }
//                echo $profile_pic;exit;
                if (!empty($_FILES['profile_image']['name'])) {
                    if (!empty($userprofile->profile_image)) {
                        $old_file = Yii::app()->basePath . '/../uploads/profile/' . $userprofile->profile_image;
                    }

                    $imageFileType = pathinfo(basename($_FILES["profile_image"]["name"]), PATHINFO_EXTENSION);
                    $filename = Yii::app()->session['login']['user_id'] . '_' . time() . '.' . $imageFileType;
                    $targetPath = dirname(__DIR__) . '/../uploads/profile/' . $filename;
                    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetPath)) {
                        $userprofile->profile_image = $filename;
//                       unlink($old_file);
                        $profile_pic = Yii::app()->baseUrl . '/uploads/profile/' . $filename;
                    }
                }
                if ($userprofile->save()) {
                    $logindata = array('user_id' => $userprofile->id,
                        'email' => $userprofile->email,
                        'role_id' => $userprofile->role_id,
                        'first_name' => $userprofile->first_name,
                        'last_name' => $userprofile->last_name,
                        'user_name' => $userprofile->first_name . ' ' . $userprofile->last_name,
                        'profile_pic' => $profile_pic
                    );
                    Yii::app()->session['login'] = $logindata;
                    Yii::app()->user->setFlash('success', "Profile updated successfully.");
                }
            }
        }
        $this->render('profile', array(
            'userprofile' => $userprofile,
            'countries' => $countries
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionMyaccount() {
        $this->layout = 'column4';
        $this->menu_class = 'page-template-default logged-in admin-bar woocommerce-account woocommerce-page    customize-support';
        $this->render('myaccount');
    }

    /**
     * Performs the AJAX validation.
     * @param Users $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetSupervisor() {
        $clients = $this->db->GetSupervisors($_GET['query']);
//        print_r($clients);exit;
        if ($clients) {
            $response = array();
            foreach ($clients as $client) {
                $response['suggestions'][] = array('value' => $client->first_name . ' ' . $client->last_name, 'data' => array('supervisor' => array('supervisor_id' => $client->id, 'supervisor_mobile_1' => $client->mobile_number), 'category' => 'fuck'));
            }
            echo json_encode($response);
            exit;
        }
    }

    public function actionCheckEmailExists() {
        if (!empty($_POST)) {
            extract($_POST);
            $check = Users::model()->findByAttributes(array('email' => $email));
            if (!empty($check)) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    public function actionCheckMobileExists() {
        if (!empty($_POST)) {
            extract($_POST);
            $check = Users::model()->findByAttributes(array('mobile_number' => $mobile_number));
            if (!empty($check)) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    public function actionChangepassword() {

        $model = new Users;
        if (!empty($_POST)) {
            extract($_POST);

            $check = Users::model()->findByPk(Yii::app()->session['userdata']['user_id']);
            if ($check) {
                if ($check->password == md5($old_password)) {
                    $check->password = md5($new_password);
                    if ($check->save()) {
                        $model->errorMessage = 'Password updated successfully';
                    }
                } else {
                    $model->errorMessage = 'Your old password mismatched';
                }
            }
        }
        $this->render('changepassword', array('model' => $model));
    }

}
