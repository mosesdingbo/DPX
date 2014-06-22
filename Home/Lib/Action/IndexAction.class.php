<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        //新闻排序呈现在首页
        $ne=M('Article');
        $news=$ne->query("select * from d_article where type='新闻速递' order by time");
        $news1=array_reverse($news);
        //dump($news1);
        $news2= array_slice($news1,0,9);
        //dump($news2);
        $this->assign('news',$news2);

        //公告排序呈现在首页
        $no=M('Article');
        $notice=$no->query("select * from d_notice where type='notice' order by time");
        $notice1=array_reverse($notice);
        //dump($notice1);
        $notice2 = array_slice($notice1,0,9);
        $this->assign('notice',$notice2);

        //呈现图片
        $s=M("Slider");
        $arrslider1=$s->select();
        $arrslider=array_reverse($arrslider1);
        //dump($arrslider);
        $this->assign("slider0",$arrslider[0][slidername]);
        $this->assign("slider1",$arrslider[1][slidername]);
        $this->assign("slider2",$arrslider[2][slidername]);
        $this->assign("slider3",$arrslider[3][slidername]);


        //比赛排名
        $b=M('Result');
        $arr1=$b->select();
        //dump($arr1);
        $this->assign ('boylist',$arr1[0]);
        $g=M('Result');
        $arr2=$g->select();
        // dump($arr2);
        $this->assign ('girllist',$arr2[1]);

        //呈现合作伙伴
        $c=M("Cooperate");
        $coop1=$c->select();
        //dump($coop);
        $coop2= array_slice($coop1,0,8);
        $this->assign("coop",$coop2);


        $this->display();
    }

    public function allnews(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        $ne=M("Article");
        //$arr1=$ne->query("select * from d_article where type='news' order by time ");
        //$arr2=array_reverse($arr1);
        //dump($arr2);
        //$this->assign("allnews",$arr2);

        //所有新闻分页
        import('ORG.Util.Page');// 导入分页类
        $count      = $ne->where("type='新闻速递'")->order("time")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条新闻');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $ne->where("type='新闻速递'")->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr2=array_reverse($list);
        //dump($arr2);
        $this->assign('allnews',$arr2);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        //$this->display(); // 输出模板

        $this->display();
    }

    public function allnotice(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        $no=M("Notice");
     /*   $arr1=$no->query("select * from d_article where type='notice' order by time ");
        $arr2=array_reverse($arr1);
        //dump($arr2);
        $this->assign("allnotice",$arr2);
     */

        //所有公告分页
        import('ORG.Util.Page');// 导入分页类
        $count      = $no->where("type='notice'")->order("time")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条公告');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $no->where("type='notice'")->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr2=array_reverse($list);
        //dump($arr2);
        $this->assign('allnotice',$arr2);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }


    public function article(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        $time=$_GET['time'];
        //echo $time;
        $ne=M("Article");
        $arr1=$ne->query("select * from d_article where time='$time' ");
        $this->assign('article',$arr1[0]);
        //dump($arr1);
        $this->display();

    }

    public function notice(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        $time=$_GET['time'];
        //echo $time;
        $n=M("notice");
        $arr1=$n->query("select * from d_notice where time='$time' ");
        $this->assign('notice',$arr1[0]);
        //dump($arr1);

        $this->display();

    }






}