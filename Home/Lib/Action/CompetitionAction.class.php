<?php
// 本类由系统自动生成，仅供测试用途
class CompetitionAction extends Action {
    public function competition(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        //呈现比赛的具体信息
        $m=M("Match");
        $time=$_GET['time'];
        $arr1=$m->query("select * from d_match where inserttime='$time' ");
        $this->assign("match",$arr1[0]);
        $matchname=$arr1[0][matchname];


        //呈现比赛的文章信息
        $a=M("Article");
        $n=M("Notice");
        $arr2=$a->query("select * from d_article where matchname='$matchname' and type='新闻速递' order by time");
        $this->assign("news",$arr2);

        $arr3=$a->query("select * from d_notice where matchname='$matchname' and type='notice' order by time");
        $this->assign("notice",$arr3);

        //呈现所有参赛球队
        $t=M("Team");
       // $arrteam=$t->query("select * from d_team where matchname='$matchname' order by teamname");
       // $this->assign("team",$arrteam);
       // $u = M('User'); // 实例化User对象
        import('ORG.Util.Page');// 导入分页类
        $count      = $t->where(" matchname='$matchname' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('team',$list1);// 赋值数据集
        $this->assign('page1',$show);// 赋值分页输出
       // $this->display(); // 输出模板


        //呈现华南球队
        //$arr5=$t->query("select * from d_team where matchname='$matchname' and location='华南' order by teamname");
        //$this->assign("huanan",$arr5);
       // $User = M('User'); // 实例化User对象
        //import('ORG.Util.Page');// 导入分页类
        $count      = $t->where(" matchname='$matchname' and location='华南' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' and location='华南' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('huanan',$list1);// 赋值数据集
        $this->assign('page2',$show);// 赋值分页输出
     //   $this->display(); // 输出模板


        //呈现华北球队
        //$arr6=$t->query("select * from d_team where matchname='$matchname' and location='华北' order by teamname");
        //$this->assign("huabei",$arr6);
        $count      = $t->where(" matchname='$matchname' and location='华北' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' and location='华北' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('huabei',$list1);// 赋值数据集
        $this->assign('page3',$show);// 赋值分页输出
        //$this->display(); // 输出模板

        //呈现华中球队
     //   $arr7=$t->query("select * from d_team where matchname='$matchname' and location='华中' order by teamname");
       // $this->assign("huazhong",$arr7);
        $count      = $t->where(" matchname='$matchname' and location='华中' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' and location='华中' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('huazhong',$list1);// 赋值数据集
        $this->assign('page4',$show);// 赋值分页输出
      //  $this->display(); // 输出模板

        //呈现华东球队
       // $arr8=$t->query("select * from d_team where matchname='$matchname' and location='华东' order by teamname");
       // $this->assign("huadong",$arr8);
        $count      = $t->where(" matchname='$matchname' and location='华东' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' and location='华东' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('huadong',$list1);// 赋值数据集
        $this->assign('page5',$show);// 赋值分页输出
       // $this->display(); // 输出模板

        //呈现西北球队
     //   $arr9=$t->query("select * from d_team where matchname='$matchname' and location='西北' order by teamname");
       // $this->assign("xibei",$arr9);
        $count      = $t->where(" matchname='$matchname' and location='西北' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' and location='西北' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        //dump($list1);
        $this->assign('xibei',$list1);// 赋值数据集
        $this->assign('page6',$show);// 赋值分页输出
        //$this->display(); // 输出模板


        //呈现西南球队
     //   $arr10=$t->query("select * from d_team where matchname='$matchname' and location='西南' order by teamname");
       // $this->assign("xinan",$arr10);
        $count      = $t->where(" matchname='$matchname' and location='西南' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' and location='西南' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('xinan',$list1);// 赋值数据集
        //dump($list1);
        $this->assign('page7',$show);// 赋值分页输出
        //$this->display(); // 输出模板

        //呈现东北球队
      //  $arr11=$t->query("select * from d_team where matchname='$matchname' and location='东北' order by teamname");
        //$this->assign("dongbei",$arr11);
        $count      = $t->where(" matchname='$matchname' and location='东北' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where(" matchname='$matchname' and location='东北' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('dongbei',$list1);// 赋值数据集
        $this->assign('page8',$show);// 赋值分页输出
        //$this->display(); // 输出模板
        $this->display();

    }

    public function competitionlist(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        //呈现赛事
        $id=$_GET['id'];
        $arr1=$u->query("select * from d_union where id='$id' ");
       // dump($arr1);
        $unionname=$arr1[0][unionname];
       //echo $unionname;

        $m=M("Match");
       // $arr2=$m->query("select * from d_match where unionname='$unionname' order by inserttime ");
        //dump($arr2);
       // $this->assign("match",$arr2);
       // $User = M('User'); // 实例化User对象
        import('ORG.Util.Page');// 导入分页类
        $count      = $m->where("unionname='$unionname''")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $m->where("unionname='$unionname'")->order('sdate')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('match',$list);// 赋值数据集
        $this->assign('page1',$show);// 赋值分页输出
        //$this->display(); // 输出模板


        $this->display();
    }

    public function team(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        $id=$_GET['id'];
        $t=M('Team');
        $arr=$t->find($id);
        // dump($arr);
        $this->assign('team',$arr);

        $teamname=$arr['teamname'];
        $matchname=$arr['matchname'];
        $m=M("Member");
        $arr1=$m->query("select * from d_member where teamname='$teamname' and type='球员' and matchname='$matchname' order by id");
        $this->assign("player",$arr1);

        $arr2=$m->query("select * from d_member where teamname='$teamname' and type='教练' and matchname='$matchname' order by id");
        $this->assign("coach",$arr2);

        $arr3=$m->query("select * from d_member where teamname='$teamname' and type='副教练' and matchname='$matchname' order by id");
        $this->assign("assistant",$arr3);

        $this->display();
    }

    //查找参赛队伍
    public function searchteam(){
        $s=M("Team");

        $teamnames=$_POST['teamnames'];
        $arr=$s->query("select * from d_team where teamname like '%$teamnames%' ");

        //  dump($arr);
        // $id=$arr[0][id];
        $this->redirect('team', array('id'=>$arr[0]['id']));


    }
}