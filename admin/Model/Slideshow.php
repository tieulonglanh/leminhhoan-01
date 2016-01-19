<?php 
class Slideshow extends AppModel
{
	public $name = "Slideshow";
	public $validate = array(
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