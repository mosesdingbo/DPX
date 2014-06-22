<?php
// 本类由系统自动生成，仅供测试用途
class ArticleAction extends CommonAction {
    public function addarticle(){
        $m=M("Match");
        $arr1=$m->select();
        $this->assign("match",$arr1);
        $this->display();
    }

    public function addnotice(){
        $m=M("Match");
        $arr1=$m->select();
        $this->assign("match",$arr1);

        $this->display();
    }

    //添加文章
    public function createarticle(){
        $a=M("Article");
        $data['title']=$_POST['title'];
        $data['content']=$_POST['content'];
        $data['matchname']=$_POST['matchname'];
        $data['type']=$_POST['type'];
        $data['time']=time();
        //dump($data);
        $result=(!$data['title'])||(!$data['content'])||(!$data['type']);
        if($result){
           $this->error('请把信息填写完整!');

        }

        $idNum=$a->add($data);
        if($idNum>0){
            $this->success('成功加入该文章');
        }else{
            $this->error('文章添加失败');
        }

    }

    //文章列表
    public function articlelist(){
        $a=M("Article");
      /*  $arr=$a->select();
        $this->assign('list',$arr);
      */

        import('ORG.Util.Page');// 导入分页类
        $count      = $a->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条信息');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr2=array_reverse($list);
        //dump($arr2);
        $this->assign('list',$arr2);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();

      }

    //
    public function noticelist(){
        //公告
        $n=M("Notice");
        //$arr=$n->select();
        //$this->assign('noticelist',$arr);

        import('ORG.Util.Page');// 导入分页类
        $count    = $n->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条公告');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $n->order("time")->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr=array_reverse($list);
        //dump($arr2);
        $this->assign('noticelist',$arr);// 赋值数据集
       // dump($arr);
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
       }

    //列表删除文章
    public function delarticle(){
        $a=M("Article");
        $time=$_GET['date'];
        //echo $time;
        $count=$a->delete($time);
        if ($count>0){
            $this->success('成功删除该文章!');
        }
        else
        {
            $this->error('对不起,文章删除失败!');
        }

    }


    //发布公告
    public function createnotice(){
        $n=M("Notice");

        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
      //  $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('xls', 'xlsx', 'doc', 'docx','txt','ppt');// 设置附件上传类型
        $upload->savePath =  './Public/Uploads/attachment/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        // 保存表单数据 包括附件数据
       // $User = M("User"); // 实例化User对象
       // $User->create(); // 创建数据对象
        $data['attachment'] = $info[0]['savename']; // 保存上传的照片根据需要自行组装
        //$User->add(); // 写入用户数据到数据库
       // $this->success('数据保存成功！');

        $data['title']=$_POST['title'];
        $data['content']=$_POST['content'];
        $data['matchname']=$_POST['matchname'];
        $data['time']=time();
        //dump($data);
        $result=(!$data['title']);
        if($result){
            $this->error('请把信息填写完整!');

        }

        $idNum=$n->add($data);
        if($idNum>0){
            $this->success('成功发布该公告!');
        }else{
            $this->error('公告发布失败!');
        }


    }

    //删除公告
    public function deletenotice(){
        $n=M("Notice");
        $time=$_GET['date'];
        //echo $time;
        $count=$n->delete($time);
        if ($count>0){
            $this->success('公告删除成功!');
        }
        else
        {
            $this->error('公告删除失败!');
        }

    }


}