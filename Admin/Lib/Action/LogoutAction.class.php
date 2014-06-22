<?php
// 本类由系统自动生成，仅供测试用途
class LogoutAction extends CommonAction {
        public function dologout(){
            $_SESSION=array();
            if(isset($_COOKIE[session_name()])){
                setcookie(session_name(),'',time()-1,'/');
            }
            session_destroy();
            $this->success('管理员退出成功!','__ROOT__/index.php/Index/index');
        }

    }
