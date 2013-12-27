<?php 

/**
 * 装修公司模型
 *
 */
class CompanyModel extends BaseModel {
	
	/*
	 * 验证form字段规则
	 */
	protected $aValidate = array(
	);
	public function __construct() {
		parent::__construct();
	}
	
	/*
	 * 查询结果处理
	 */
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$value['logo'] = getFileUrl($value['logo']);
			$value['tags'] = array_diff(explode('|',$value['tags']),array(''));
		}
	}
	protected function _after_find(&$data,$options) {
		 $data['logo'] = getFileUrl($data['logo']);
	}
	
	/*
	 * 首页公司排行榜
	 */
	public function getIndexTop($limit, $iOrd) {
		$iOrd = (int) $iOrd;
		if ($iOrd == 1) {
			//专家评分
			$order = 'score_expert DESC';
		} elseif ($iOrd == 2) {
			//业主评分
			$order = 'score_owner DESC';
		} else {
			//综合评分
			$order = 'score_complex DESC';
		}
		
		$aWhere = array();
		
		return $this->where($aWhere)->order($order)->limit($limit)->select();
	}
	
	/*
	 * 获取首页推荐的公司
	 */
	public function getTopByType($type, $limit) {
		$aWhere = array(
			'type' => $type,
		);
		
		return $this->where($aWhere)->order('ord DESC')->limit($limit)->select();
	}
	/*
	 * 获取图片url
	 */
	/*
	 * 获取一页4个公司
	 */
	public function getPage($size = 4) {
		$p = getRequest(C('VAR_PAGE'));
		return $this->where(array())->order('ord DESC')->page($p.','.$size)->select();
	}
}



?>