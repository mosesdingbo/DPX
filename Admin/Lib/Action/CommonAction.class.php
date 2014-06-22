<?php
// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {
    Public function _initialize(){
        // 初始化的时候检查用户权限
         if(!isset($_SESSION['username']) || $_SESSION['username']==''){
            $this->error('请用管理员账户登录!!','__ROOT__/index.php/Login/login');
        }
    }
}