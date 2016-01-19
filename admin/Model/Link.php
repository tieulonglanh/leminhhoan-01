<?php 
class Link extends AppModel
{
	public $name = "Link";
	public $validate = array(
        'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Phải nhập tên cho quảng cáo',
					'allowEmpty' => false
				)
		),
		'images' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Phải nhập đường dẫn ảnh',
					'allowEmpty' => false
				)
		),
		'position' => array(
			'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Phải chọn vị trí của quảng cáo',
					'allowEmpty' => false
				)
		),
		'sort_order' => array(
			'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Thứ tự sắp xếp không được bỏ trống và phải là chữ số',
					'allowEmpty' => false
				)
		)
    );
}
?>