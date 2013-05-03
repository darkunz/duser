<?php

/**
 * Description of UAuthManager
 *
 * @author Darwin
 */
class UAuthManager extends CachedDbAuthManager
{
    public $behaviors = array(
        'AuthBehavior' => array(
            'class' => 'AuthBehavior'
        ),
    );
}