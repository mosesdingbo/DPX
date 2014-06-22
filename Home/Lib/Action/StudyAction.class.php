<?php
// 本类由系统自动生成，仅供测试用途
class StudyAction extends Action {
    public function study(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);

        //呈现教学心得
        $in=M("Article");
       /* $arr1=$in->query("select * from d_article where type='teaching' order by time ");
        $arr2=array_reverse($arr1);
        //dump($arr2);
        $this->assign("teachinglist",$arr2);
       */

        //所有新闻分页
        import('ORG.Util.Page');// 导入分页类
        $count      = $in->where("type='教学心得'")->order("time")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条信息');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $in->where("type='教学心得'")->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr2=array_reverse($list);
        //dump($arr2);
        $this->assign('teachinglist',$arr2);// 赋值数据集
        $this->assign('page1',$show);// 赋值分页输出


        //呈现科技动态
       /* $in=M("Article");
        $arr3=$in->query("select * from d_article where type='science' order by time ");
        $arr4=array_reverse($arr3);
        //dump($arr2);
        $this->assign("sciencelist",$arr4);
     */
        //所有新闻分页
        import('ORG.Util.Page');// 导入分页类
        $count      = $in->where("type='科技动态'")->order("time")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条信息');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $in->where("type='科技动态'")->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr3=array_reverse($list);
        //dump($arr2);
        $this->assign('sciencelist',$arr3);// 赋值数据集
        $this->assign('page2',$show);// 赋值分页输出

        //呈现我有疑问
        /*$in=M("Article");
        $arr5=$in->query("select * from d_article where type='question' order by time ");
        $arr6=array_reverse($arr5);
        //dump($arr2);
        $this->assign("questionlist",$arr6);
      */

        //所有新闻分页
        import('ORG.Util.Page');// 导入分页类
        $count      = $in->where("type='我有疑问'")->order("time")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条信息');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $in->where("type='我有疑问'")->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr4=array_reverse($list);
        //dump($arr2);
        $this->assign('questionlist',$arr4);// 赋值数据集
        $this->assign('page3',$show);// 赋值分页输出

        $this->display();
    }
}