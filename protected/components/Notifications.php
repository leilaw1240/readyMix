<?php

Yii::import('zii.widgets.CPortlet');

class Notifications extends CPortlet {
    
    


    protected function renderContent() {
        
        $roles = '';
        $c = new CDbCriteria();
        $c->join = 'join tbl_users as t1 on t1.role_id = t.id';
        $c->condition = 't1.id = '.Yii::app()->session['userdata']['user_id']; // and t.created_by != 1
        $getActiveModules = UserRoles::model()->find($c);
        if(!empty($getActiveModules)){
            if($getActiveModules->permissions){
                $roles = unserialize($getActiveModules->permissions);
                $roles = array_keys($roles);
                 
            }
        }
        
//        echo '<pre>'; print_r($roles);exit;
        
        $c = new CDbCriteria();
        $c->select = "t.id,t2.first_name ,t2.last_name,t2.profile_image ,case t.activity_type when '1' then 'Created' when '2' then 'Updated' when '3' then 'Deleted' when '4' then 'Created' when '5' then 'Updated' when '6' then 'Deleted'  end as action  ,t.created_date , t1.lookup_value";
        $c->join = 'join tbl_look_up as t1 on t1.id = t.module_id';
        $c->join .= ' join tbl_users as t2 on t2.id = t.created_by';
        $c->condition = 't.status is null'; // and t.created_by != 1
        $c->addInCondition('t.module_id', $roles);
        $c->order = 'created_date desc';
        $notifications = SystemLog::model()->findAll($c);
//        print_r($notifications);
         
        $this->render('notifications', array('notifications' => $notifications));
         

    }

}
