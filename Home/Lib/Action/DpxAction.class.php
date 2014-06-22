<?php
// 本类由系统自动生成，仅供测试用途
class DpxAction extends Action {
    public function contact(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        //联系人
        $w=M("Website");
        $arr1=$w->select();
        $this->assign("website",$arr1[0]);
        $this->display();
    }

    public function intro(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        //网站介绍
        $m=M("Website");
        $arr=$m->find();
        // dump($arr);
        $name='thinkphp';
        $this->assign('website',$arr);
        $this->display();
    }

    public function member(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        //呈现全部学校
        $s=M("School");
        //$arrschool=$s->select();
        //dump($arrschool);
        //$this->assign("school",$arrschool);

        import('ORG.Util.Page');// 导入分页类
        $count      = $s->count();// 查询满足要求的总记录数
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('school',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        //$this->display(); // 输出模板

        //呈现华北高校
        $count     = $s->where("location='华北' ")->order("id")->count();// 查询满足要求的总记录数
      //  echo $count;
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->where("location='华北' ")->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('huabei',$list);// 赋值数据集
        $this->assign('page2',$show);// 赋值分页输出

        //呈现东北高校
        $count      = $s->where("location='东北' ")->order("id")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show      = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->where("location='东北' ")->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('dongbei',$list);// 赋值数据集
        $this->assign('page3',$show);// 赋值分页输出

        //呈现华东高校
        $count      = $s->where("loaction='华东' ")->order("id")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->where("location='华东' ")->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('huadong',$list);// 赋值数据集
        $this->assign('page4',$show);// 赋值分页输出

        //呈现华中高校
        $count      = $s->where("location='华中' ")->order("id")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->where("location='华中' ")->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('huazhong',$list);// 赋值数据集
        $this->assign('page5',$show);// 赋值分页输出

        //呈现西北高校
        $count      = $s->where("location='西北' ")->order("id")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->where("location='西北' ")->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('xibei',$list);// 赋值数据集
        $this->assign('page6',$show);// 赋值分页输出

        //呈现西南高校
        $count      = $s->where("location='西北' ")->order("id")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->where("location='西南' ")->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('xinan',$list);// 赋值数据集
        $this->assign('page7',$show);// 赋值分页输出


        //呈现华南高校
        $count      = $s->where("location='华南' ")->order("id")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->where("location='华南' ")->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('huanan',$list);// 赋值数据集
        $this->assign('page8',$show);// 赋值分页输出

        $this->display();
    }

    //呈现会员学校具体信息
    public function school(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        $s=M('School');
        $id=$_GET['id'];
        $arr1=$s->query("select * from d_school where id='$id' ");
        $this->assign("school",$arr1[0]);

        $this->display();
    }

    //查找会员学校
    public function searchschool(){
        $s=M("School");

        $name=$_POST['schoolname'];
        $arr=$s->query("select * from d_school where name like '%$name%' ");

        //  dump($arr);
       // $id=$arr[0][id];
        $this->redirect('school', array('id'=>$arr[0]['id']));

    }




}