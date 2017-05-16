<?php

class ClientController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $db;

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
        $model = new Clients;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Clients'])) {
            $model->attributes = $_POST['Clients'];
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

        if (isset($_POST['Clients'])) {
            $model->attributes = $_POST['Clients'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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

        $model = new Clients();
        $c = new CDbCriteria();

        $count = Clients::model()->count($c);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($c);
        $c->select = 't.*';
//        $c->join = 'join tbl_user_roles as t1 on t1.id = t.role_id and t.role_id !=1';
        $c->order = 't.created_date desc';

        $clients = Clients::model()->findAll($c);
        $this->render('index', array(
            'clients' => $clients,
            'pages' => $pages,
            'model' => $model
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Clients('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Clients']))
            $model->attributes = $_GET['Clients'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Clients the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Clients::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Clients $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'clients-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetClients() {
//        echo '<pre>';
        $clients = $this->db->getClients($_GET['query']);
        $response = array("query" => "Unit",);

        if (!empty($clients)) {
            foreach ($clients as $client) {

                $response['suggestions'][] = array(
                    'value' => $client->client_name,
                    'data' => array(
                        'client' => array('client_id' => $client->id, 'client_name' => $client->client_name, 'client_address_1' => $client->address_1, 'client_address_2' => $client->address_2, 'client_mobile_1' => $client->mobile_1, 'client_mobile_2' => $client->mobile_2, 'identity_proof' => !empty($client->identity_proof) ? $this->getFilePath('proof', $client->identity_proof) : ''),
                        'category' => 'P'
                    )
                );

                $getSites = ClientSites::model()->findAll(array('condition' => 'client_id =' . $client->id));

                foreach ($getSites as $getSite) {
                    $response['suggestions'][] = array(
                        'value' => $client->client_name . '<br>-' . $getSite->site_name,
                        'data' => array(
                            'client' => array('client_id' => $client->id, 'client_name' => $client->client_name, 'client_address_1' => $client->address_1, 'client_address_2' => $client->address_2, 'client_mobile_1' => $client->mobile_1, 'client_mobile_2' => $client->mobile_2, 'identity_proof' => !empty($client->identity_proof) ? $this->getFilePath('proof', $client->identity_proof) : ''),
                            'site' => array('site_id' => $getSite->id, 'site_name' => $getSite->site_name, 'site_address_1' => $getSite->address_1, 'site_address_2' => $getSite->address_2, 'site_mobile_1' => $getSite->mobile_1, 'site_mobile_2' => $getSite->mobile_2),
                            'category' => 'S',
                        )
                    );
                }
            }
        } else {
            $response['suggestions'] = '';
        }


        echo json_encode($response);
        exit;
    }

}
