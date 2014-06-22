<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function login(){

        $this->display();
    }

    public function dologin(){
        //接受值
        //判断用户在数据库中是否存在
        //存在 允许登录
        //不存在 显示错误信息
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user=M('User');
        $where['username']=$username;
        $where['password']=md5($password);
        $arr=$user->where($where)->find();
        if($arr){
            $_SESSION['username']=$username;
            $_SESSION['id']=$arr['id'];
            $this->success('管理员登录成功','__ROOT__/admin.php');
        }else{
            $this->error('该用户不存在或密码错误!');
        }

    }




}
