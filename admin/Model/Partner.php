<?php 
class Partner extends AppModel
{
	public $name = "Partner";
	public $validate = array(
	'name' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Phải nhập tên đối tác',
					'allowEmpty' => false
				)
		),
        'images' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Phải nhập đường dẫn ảnh',
					'allowEmpty' => false
				)
		)
    );
}
?>