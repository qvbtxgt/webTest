<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class MajorModel extends RelationModel{
	protected $_link = array(
			//与表stu_class关联，且是一对多的关系
		'Class' => self::HAS_MANY,
	);
}