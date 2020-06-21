<?php

class Model_todo extends Orm\Model
{
    protected static $_properties = array(
        'id',
        'id' => array(
            'data_type' => 'int',
        ),
        'inputfield' => array(
            'data_type' => 'varchar',
        ),
        'status' => array(
            'data_type' => 'int',
        ),
    );


    protected static $_table_name = 'list';

    protected static $_primary_key = array('id'); 

}