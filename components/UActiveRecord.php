<?php

/**
 * Description of UserActiveRecord
 *
 * @author Darwin
 */
class UActiveRecord extends CActiveRecord
{
    /**
     * 
     * @return type
     */
    public function behaviors() 
    {
        return array(
            'DModelBehavior' => array(
                'class' => 'DModelBehavior',
            )
        );
    }
}