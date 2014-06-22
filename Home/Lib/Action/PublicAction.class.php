<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends Action {
    public function header(){
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);
        $this->display();
    }
}