<?php 
class Video extends AppModel
{
	public $name = "Video";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'VideoCategory'=>array(
				'className'=>'VideoCategory',	
				'foreignKey'=>'video_category_id'
			),
                        'User'=>array(
                                        'className'=>'User',	
                                        'foreignKey'=>'created_by'
                                )
                        );
	
}
?>