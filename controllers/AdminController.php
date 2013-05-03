<?php

/**
 * Description of AdminController
 *
 * @author Darwin
 */
class AdminController extends UController
{
    public $modelName = 'User';

    public $layout = 'admin';
    
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    
    public function accessRules() 
    {
        return array(
            array(
                'allow',
                'users' => array('@'),
                'roles' => array('superadmin')
            ),
            array('deny')
        );
    }
    
    public function actions()
    {
        return array(
            'create' => array(
                'class' => 'ext.crudActions.DCreate',
                'onBeforeSettingAttributes' => array($this, 'fillupUsername'),
            ),
            'index' => array(
                'class' => 'ext.crudActions.DList',
            ),
            'update' => array(
                'class' => 'ext.crudActions.DUpdate',
                'onBeforeSettingAttributes' => array($this, 'checkPasswordUpdate')
            ),
            'delete' => array(
                'class' => 'ext.crudActions.DDelete',
            )
        );
    }
    
    /**
     * 
     * @param type $event
     */
    public function fillupUsername($event)
    {
        $event->params['attributesToUpdate']['username'] = $event->params['attributesToUpdate']['email'];
    }
    
    /**
     * 
     * @param type $event
     */
    public function checkPasswordUpdate($event)
    {
        $attributes = $event->params['attributesToUpdate'];
        if (!$attributes['password']) {
            unset($attributes['password']);
        }
        
        $event->params['attributesToUpdate'] = $attributes;
    }
}