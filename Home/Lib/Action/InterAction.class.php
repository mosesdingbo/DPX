<?php
// 本类由系统自动生成，仅供测试用途
class InterAction extends Action {
    public function inter(){
        //开头
        $u=M("Union");
        $arr10=$u->select();
        //dump($arr1);
        $this->assign("union",$arr10);


        //国际交流文章呈现
        $in=M("Article");
     /*   $arr1=$in->query("select * from d_article where type='international' order by time ");
        $arr2=array_reverse($arr1);
        //dump($arr2);
        $this->assign("interlist",$arr2);
     */

        //所有新闻分页
        import('ORG.Util.Page');// 导入分页类
        $count      = $in->where("type='国际往来'")->order("time")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条信息');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $in->where("type='国际往来'")->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr2=array_reverse($list);
        //dump($arr2);
        $this->assign('interlist',$arr2);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }
}