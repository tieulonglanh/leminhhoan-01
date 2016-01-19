<?php

class Video extends AppModel {

    public $name = "Video";
    public $tag;
    public $actsAs = array('Tree');
    public $belongsTo = array(
        'VideoCategory' => array(
            'className' => 'VideoCategory',
            'foreignKey' => 'video_category_id'
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'created_by'
        ),
        'Administrator' => array(
            'className' => 'Administrator',
            'foreignKey' => 'created_admin'
        )
    );
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Tên không được để trống',
                'allowEmpty' => false
            )
        ),
        'images' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Ảnh không được để trống',
                'allowEmpty' => false
            )
        ),
        'sort_order' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Thứ tự sắp xếp không được để trống và phải là số',
                'allowEmpty' => false
            )
        ),
        'link' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Link không được để trống',
                'allowEmpty' => false
            )
        )
    );

}

?>