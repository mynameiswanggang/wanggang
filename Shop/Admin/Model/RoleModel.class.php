<?php
namespace Admin\Model;
use Think\Model;

//角色表模型
class RoleModel extends Model{
    //当前表中的所有字段
    private $_fields = array();
    
    public function __construct(){
        parent::__construct();
        $this->_fields = $this->getDbFields();
    }
    
    //获取角色表中某个字段的数组('id'=>'name')
    public function field_array($field){
        $tmp = explode(',', $field);
        if(!tmp){
            return false;
        }
        foreach ($tmp as $f){
            if(!in_array($f, $this->_fields)){
                return false;
            }
        }
        return $this->getField($field);
    }
}