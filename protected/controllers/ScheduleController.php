<?php

class ScheduleController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $errorMessage;
    
    public $colors = array('#f44242', '#89f441', '#89f441', '#f4c441', '#1A82C3');
    
    public $status = array('Pending','Approved','In Progress','Completed','Payout');

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
    public function actionCreate() {

        $model = new Schedules;

        if (!empty($_POST)) {
//            echo '<pre>'; print_r($_POST); print_r($_FILES); exit;
            extract($_POST);

            //Adding Client info if not available
            if (empty($client_id)) {
                $newClient = new Clients();
                $newClient->attributes = $client;
                if ($_FILES['identity_proof']['name'] != '') {
                    $upload = $this->UploadImage($_FILES, $this->uploads['proof']);
                    if ($upload['success']) {
                        $newClient->identity_proof = $upload['file_name'];
                    }
                }
                $newClient->created_by = Yii::app()->session['userdata']['user_id'];
                $newClient->created_date = date('Y-m-d H:i:s');
                $newClient->status = 1;
                $newClient->save();
                $client_id = $newClient->id;
            }
            //Adding Site info if not available
            if (empty($site_id)) {
                $newSite = new ClientSites();
                $newSite->attributes = $site;
                $newSite->client_id = $client_id;
                $newSite->created_by = Yii::app()->session['userdata']['user_id'];
                $newSite->created_date = date('Y-m-d H:i:s');
                $newSite->status = 1;
                $newSite->save();
                $site_id = $newSite->id;
            }

            if (!empty($site_id)) {
                //Adding schedule info
                $newSchedule = new Schedules();
                $newSchedule->attributes = $work;
                $newSchedule->start_date = date('Y-m-d H:i:s', strtotime($work['start_date']));
                $newSchedule->end_date = date('Y-m-d H:i:s', strtotime($work['end_date']));
                $newSchedule->site_id = $site_id;
                $newSchedule->supervisor_id = $supervisor_id;
                $newSchedule->created_by = Yii::app()->session['userdata']['user_id'];
                $newSchedule->created_date = date('Y-m-d H:i:s');
                $newSchedule->status = 0;
                if ($newSchedule->save()) {
                    //Adding Payment info
                    $payment['paid_amount'] = $work['advance_amount'];
                    $payment['due_amount'] = $work['estimated_amount'];
                    $payment['schedule_id'] = $newSchedule->id;
//                    $payment['payment_due_date'] = date('Y-m-d H:i:s',  strtotime('+'+$payment['credit_preriod']+' days '));
//                    
                    $payment['status'] = 1;

//                    if ($work['advance_amount'] > 0) {
//                        print_r($payment['credit_preriod']);exit;

                    $newPayment = new SchedulePayments();
                    $newPayment->attributes = $payment;
                    if (!empty($payment['credit_preriod'])) {
                        $period = $payment['credit_preriod'];
                        $newPayment->payment_due_date = date('Y-m-d', strtotime("+" . $period . " days"));
                    }
                    $newPayment->created_by = Yii::app()->session['userdata']['user_id'];
                    $newPayment->created_date = date('Y-m-d H:i:s');
                    $newPayment->save();
//                    }
                    //Logging activity
                    $activity_data = array('module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]);
                    $this->logactivity(array('source_id' => $model->id, 'module_info' => $this->getModuleid(Yii::app()->controller->id), 'activity_type' => $this->activity_status[Yii::app()->controller->action->id]));
                    $this->redirect(array('index'));
                } else {
                    $this->errorMessage = 'Unable to create schedule';
                }
            } else {
                $this->errorMessage = 'Site information not available';
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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

//        echo 'u r in ';exit;

        $this->render('index');
    }

    public function actionGetSchedules() {


        $start_time = $_GET['start'];
        $end_time = $_GET['end'];

        $schedules = $this->db->getSchedules($start_time, $end_time);
        
//        $calender_data['current_date'] = date('Y-m-d');
        $events = array();
        if (!empty($schedules)) {
            foreach ($schedules as $schedule) {

                $events[] = array(
                    'id' => $schedule->id,
                    'title' => $schedule->client_name,
                    'start' => $schedule->start_date,
                    'end' => $schedule->end_date,
                    'backgroundColor' => $this->colors[$schedule->status]
                );
            }
            echo json_encode($events);
            exit;
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Schedules the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Schedules::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Schedules $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'schedules-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionUpdate($schedule_id) {

        $data['schedule'] = 0;
        $data['payments'] = 0;
        $data['notes'] = 0;


        if (!empty($schedule_id)) {
            $schedule_info = $this->db->getScheduleInfo($schedule_id);
            if (!empty($schedule_info)) {
                $data['schedule'] = $schedule_info[0];
                if (!empty($data['schedule']->identity_proof)) {
                    $data['schedule']->identity_proof = $this->getFilePath('proof', $data['schedule']->identity_proof);
                }
            }

            $payments = SchedulePayments::model()->findAll(array('condition' => 'status = 1 and schedule_id=' . $schedule_id, 'order' => 'created_date desc'));
            if (!empty($payments)) {
                $data['payments'] = $payments;
            }
            $c = new CDbCriteria();
            $c->select = 't.*,t1.first_name,t1.last_name,t1.profile_image';
            $c->join = 'join tbl_users t1 on t1.id= t.created_by';
            $c->condition = 't.schedule_id = ' . $schedule_id . ' and t.status= 1';
            $c->order = 't.created_date desc';
            $notes = ScheduleNotes::model()->findAll($c);

            if (!empty($notes)) {
                $data['notes'] = $notes;
            }

            if (!empty($_POST)) {

//                echo '<pre>'; print_r($_POST);  print_r($_FILES); exit;
                extract($_POST);
                $update_type = $_POST['update_type'];
                unset($_POST['update_type']);
                if ($update_type == 'note') {

                    $check = Schedules::model()->findByPk($schedule_id);
                    if ($check) {
                        $check->status = 2;
                        $check->save();
                    }
                    $newNote = new ScheduleNotes();
                    $newNote->attributes = $_POST;
                    if ($_FILES['file_name']['name'] != '') {
                        $upload = $this->UploadImage($_FILES, $this->uploads['schedule']);
                        if ($upload['success']) {
                            $newNote->file_name = $upload['file_name'];
                        }
                    }
                    $newNote->created_by = Yii::app()->session['userdata']['user_id'];
                    $newNote->created_date = date('Y-m-d H:i:s');
                    $newNote->status = 1;
                    if ($newNote->save()) {

                        Yii::app()->user->setFlash('note', 'Schedule Updated Sucessfully');
                        $this->redirect(Yii::app()->baseUrl . '/schedule/update?schedule_id=' . $schedule_id . '#notes');
                    }
                } else if ($update_type == 'approve') {
//                    echo '<pre>'; print_r($_POST);  print_r($_FILES); exit; 
                    $check = Schedules::model()->findByPk($schedule_id);
                    if ($check) {
                        $check->status = 1;
                        $check->save();
                        $newNote = new ScheduleNotes();
                        $newNote->attributes = $_POST;
                        if ($_FILES['file_name']['name'] != '') {
                            $upload = $this->UploadImage($_FILES, $this->uploads['schedule']);
                            if ($upload['success']) {
                                $newNote->file_name = $upload['file_name'];
                            }
                        }
                        $newNote->created_by = Yii::app()->session['userdata']['user_id'];
                        $newNote->created_date = date('Y-m-d H:i:s');
                        $newNote->status = 1;
                        $newNote->save();
                        Yii::app()->user->setFlash('schedule', 'Schedule Approved Sucessfully');
                        $this->redirect($this->createUrl('schedule/update', array('schedule_id' => $schedule_id)));
                    }
                } else if ($update_type == 'complete') {
                    $check = Schedules::model()->findByPk($schedule_id);
                    if ($check) {
                        $check->status = 3;
                        $check->save();
                        Yii::app()->user->setFlash('schedule', 'Schedule Completed Sucessfully');
                        $this->redirect($this->createUrl('schedule/update', array('schedule_id' => $schedule_id)));
                    }
                } else if ($update_type == 'payment') {

                    $c = new CDbCriteria();
                    $c->select = 't.schedule_id ,SUM(t.paid_amount) as paid_amount , SUM(t.due_amount) as due_amount,t1.estimated_amount,t3.client_name,t3.mobile_1';
                    $c->join = 'join tbl_schedules t1 on t1.id = t.schedule_id ';
                    $c->join .= ' join tbl_client_sites t2 on t2.id = t1.site_id ';
                    $c->join .= ' join tbl_clients t3 on t3.id = t2.client_id ';
                    $c->condition = 't.schedule_id = ' . $schedule_id;
                    $c->group = 't.schedule_id';
                    $schedule_payement_info = SchedulePayments::model()->find($c);

                    $schedule_payement_info->due_amount = $schedule_payement_info->estimated_amount - $schedule_payement_info->paid_amount;

//                    echo '<pre>'; print_r($schedule_payement_info); print_r($_POST); exit; 

                    if ($_POST['work']['paid_amount'] <= $schedule_payement_info->due_amount) {
                        $newPayment = new SchedulePayments();
                        $payment['status'] = 1;
                        $payment['schedule_id'] = $schedule_id;
                        $payment['paid_amount'] = $_POST['work']['paid_amount'];
                        $payment['due_amount'] = $schedule_payement_info->estimated_amount - ($_POST['work']['paid_amount'] + $schedule_payement_info->paid_amount);
//                        echo '<pre>'; print_r($payment); exit;
                        $newPayment->attributes = $payment;
                        if (!empty($payment['credit_preriod'])) {
                            $period = $payment['credit_preriod'];
                            $newPayment->payment_due_date = date('Y-m-d', strtotime("+" . $period . " days"));
                        }
                        $newPayment->created_by = Yii::app()->session['userdata']['user_id'];
                        $newPayment->created_date = date('Y-m-d H:i:s');
                        $newPayment->save();
                        if ($_POST['work']['paid_amount'] == $schedule_payement_info->due_amount) {
                            $check = Schedules::model()->findByPk($schedule_id);
                            $check->status = 4;
                            $check->save();
                        }
                        Yii::app()->user->setFlash('payment', 'Payment Updated Successfully');
                        $this->redirect(Yii::app()->baseUrl . '/schedule/update?schedule_id=' . $schedule_id . '#payments');
                    } else {
                        Yii::app()->user->setFlash('payment', 'Invalid amount');
                        $this->redirect(Yii::app()->baseUrl . '/schedule/update?schedule_id=' . $schedule_id . '#payments');
                    }
                }
            }
        }


//        echo '<pre>'; print_r($data);exit;

        $this->render('update', $data);
    }

    public function addScheduleNote($data) {
        
    }

    public function actionCheckSlotAvailability() {
        if (!empty($_POST)) {
//            echo '<pre>'; print_r($_POST);exit;
            extract($_POST);
            $start_date = strtotime($start_date);
            $end_date = strtotime($end_date);
//            echo $start_date.'#'.$end_date;exit;
            $check = Schedules::model()->find(array('condition' => ' ' . $start_date . ' BETWEEN UNIX_TIMESTAMP(start_date) and UNIX_TIMESTAMP(end_date) or ' . $end_date . ' BETWEEN UNIX_TIMESTAMP(start_date) and UNIX_TIMESTAMP(end_date)'));
            $response['error'] = false;
            if (!empty($check)) {
                $response['error'] = true;
                $response['message'] = 'Selected slot is not available';
            }
            echo json_encode($response);
        }
    }

    public function actionUserSchedules() {
        $data = array();

        $user_id = !empty($_GET['user_id']) ? $_GET['user_id'] : 0;

        if ($user_id) {

            $c = new CDbCriteria();
            $c->condition = 't.created_by = ' . $user_id;

            $count = Schedules::model()->count($c);
            $pages = new CPagination($count);
            // results per page
            $pages->pageSize = 10;
            $pages->applyLimit($c);

            $c->select = 't.*,t3.client_name,t3.identity_proof,t2.site_name,t2.address_1 as site_address_1,t2.address_2 as site_address_2,t2.mobile_1 as site_mobile_1,t2.mobile_2 as site_mobile_2,t3.address_1 as client_address_1,t3.address_2 as client_address_2,t3.mobile_1 as client_mobile_1,t3.mobile_2 as client_mobile_2,t4.first_name,t4.last_name ,t4.mobile_number as supervisor_mobile_number';
            $c->join = 'join tbl_client_sites t2 on t2.id = t.site_id and t2.status =1';
            $c->join .= ' join tbl_clients t3 on t3.id = t2.client_id and t3.status = 1';
            $c->join .= ' join tbl_users t4 on t4.id = t.supervisor_id and t4.status = 1';
            $c->condition = 't.created_by = ' . $user_id;
            $c->order = 't.created_date desc';

            $data['pages'] = $pages;

            $data['schedules'] = Schedules::model()->findAll($c);

//            echo '<pre>'; print_r($data); exit;

            $this->render('UserSchedules', $data);
        }
    }

}
