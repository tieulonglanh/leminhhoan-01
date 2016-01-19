<?php 
class Gallery extends AppModel
{
	public $name = "Gallery";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'GalleryCategory'=>array(
				'className'=>'GalleryCategory',	
				'foreignKey'=>'gallery_category_id'
			)
		);
	
	public $validate = array(
        'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Tên không được để trống',
					'allowEmpty' => false
				)
		),
		'images' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Ảnh không được để trống',
					'allowEmpty' => false
				)
		),
		'sort_order' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Thứ tự sắp xếp không được để trống và phải là số',
					'allowEmpty' => false
				)
		)
    );
}
?>