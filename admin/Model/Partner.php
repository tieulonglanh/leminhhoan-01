<?php 
class Partner extends AppModel
{
	public $name = "Partner";
	public $validate = array(
	'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Phải nhập tên đối tác',
					'allowEmpty' => false
				)
		),
        'images' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Phải nhập đường dẫn ảnh',
					'allowEmpty' => false
				)
		)
    );
}
?>