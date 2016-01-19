<?php 
class Link extends AppModel
{
	public $name = "Link";
	public $validate = array(
        'name' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Phải nhập tên cho quảng cáo',
					'allowEmpty' => false
				)
		),
		'images' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Phải nhập đường dẫn ảnh',
					'allowEmpty' => false
				)
		),
		'position' => array(
			'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Phải chọn vị trí của quảng cáo',
					'allowEmpty' => false
				)
		),
		'sort_order' => array(
			'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Thứ tự sắp xếp không được bỏ trống và phải là chữ số',
					'allowEmpty' => false
				)
		)
    );
}
?>