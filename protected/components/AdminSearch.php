<?php

Yii::import('zii.widgets.CPortlet');

class AdminSearch extends CPortlet {
    
    var $model;

    protected function renderContent() {
        $data = array();
        $data['model'] = $this->model;
        $data['roles'] = UserRoles::model()->findAll(array('condition'=>'status = 1 and id != 1'));
        $this->render('adminsearch', $data);
    }

}
