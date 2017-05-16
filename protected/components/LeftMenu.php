<?php

Yii::import('zii.widgets.CPortlet');

class LeftMenu extends CPortlet {

    protected function renderContent() {
        $user_permissions = UserRoles::model()->findByPk(Yii::app()->session['userdata']['role_id']);
        $data['permissions'] = '';
        if (!empty($user_permissions->permissions)) {
            $data['permissions'] = unserialize($user_permissions->permissions);
        }
        $this->render('leftmenu',$data);
    }

}
