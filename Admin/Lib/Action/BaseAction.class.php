<?php
// 本类由系统自动生成，仅供测试用途
class BaseAction extends CommonAction {
    //呈现合作伙伴
    public function addcooperate(){
        $p=M("Cooperate");
        $arr1=$p->select();
        //dump($arr);
        $this->assign('data',$arr1);
        $this->display();
    }

    //呈现网站信息
    public function website(){
        $w=M("Website");
        $arr1=$w->select();
        $this->assign("website",$arr1);

        $this->display();
    }

    //动态图
    public function slider(){
        $s=M("Slider");
        $arr1=$s->select();
        $this->assign("slider",$arr1);

        $this->display();
    }

    //增加动态图
    public function createslider(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 5242880 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Uploads/sliderimage/';// 设置附件上传目录

        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '589,200';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '392,200';
        //设置生成缩略图后移除原图
        $upload->thumbRemoveOrigin = true;

        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }

        // 保存表单数据 包括附件数据
        $s = M("Slider"); // 实例化User对象
        //$S->create(); // 创建数据对象
        $s->slidername = $info[0]['savename']; // 保存上传的照片根据需要自行组装
        //dump($data);

        $count=$s->add(); // 写入用户数据到数据库
        if($count>0){
            $this->success('动态图上传成功！');
        }else{
            $this->error('动态图上传失败');
        }
    }

    //删除动态图
    public function deleteslider(){
        $s=M("Slider");
        $id=$_GET['id'];
        $count=$s->delete($id);
        if($count>0){
            $this->success('动态图删除成功');
        }else{
            $this->error('动态图删除失败');
        }

    }

    public function addwebsite(){
        //修改大排协寄出信息
        $w=M("Website");
        $data['id']=1;
        $data['intro']=$_POST['intro'];
        $data['rule']=$_POST['rule'];
        $data['org']=$_POST['org'];
        $data['con']=$_POST['con'];
          // dump($data);
        $count=$w->save($data);
        if($count>0){
            $this->success('数据修改成功!');
        }else{
            $this->error('数据修改失败!');
        }


    }

    public function  createcooperate(){
        //添加大排协合作伙伴
        $c=M("Cooperate");
        $data['partner']=$_POST['partner'];
        $data['link']=$_POST['link'];
        //dump($data);

        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        //$upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '136,136';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '65,65';
        //设置生成缩略图后移除原图
        $upload->thumbRemoveOrigin = true;

        $upload->savePath =  './Public/Uploads/coopimage/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        // 保存表单数据 包括附件数据
       // $User = M("User"); // 实例化User对象
       // $User->create(); // 创建数据对象
       $data['coopimage']= $info[0]['savename']; // 保存上传的照片根据需要自行组装
       // $count=$c->add($data); // 写入用户数据到数据库
        //$this->success('数据保存成功！');

        $result=(!$data['partner']);
        if($result){
            $this->error('请把信息填写完整!');
        }


        $count=$c->add($data);
        if($count>0){
            $this->success('数据添加成功!');
        }else{
            $this->error('数据添加失败!');
        }
    }

        //删除合作伙伴
    public function delcooperate(){
            $m=M('Cooperate');
            $id=$_GET['id'];
            $count=$m->delete($id);
            if($count>0){
                $this->success('数据删除成功');
            }else{
                $this->error('数据删除失败');
            }
    }

    }