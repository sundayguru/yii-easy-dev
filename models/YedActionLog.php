<?php

class YedActionLog extends YedActiveRecord
{
    public static $_table_name = 'yed_action_log';
    public $log = false;

    public static function setColumns(){
        self::$columns = array(
            'user_id'=>array('field'=>YedColumn::integerField()),
            'model_name'=>array('field'=>YedColumn::charField(), 'like'=>false),
            'model_id'=>array('field'=>YedColumn::integerField(), 'like'=>false),
            'action'=>array('field'=>YedColumn::charField()),
            'model_data'=>array('field'=>YedColumn::longTextField()),
            'system_info'=>array('field'=>YedColumn::longTextField()),
        );

        return self::$columns;
    }


    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return YedLog the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


    public static function add($action, $model){
    	$log = new self;
        $log->model_id = $model->id;
        $log->model_name = get_class($model);
        $log->user_id = Y::userId();
        $log->action = $action;
        $log->model_data = json_encode($model->attributes);
        $log->system_info = json_encode(YedUtil::getBrowser());
        $log->save(false);
    }

}