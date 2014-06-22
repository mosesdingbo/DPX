<?php
// 本类由系统自动生成，仅供测试用途
class SchoolAction extends CommonAction {
    public function addschool(){
        $this->display();
    }

    public function schoollist(){
        $s=M("School");
     /*   $arr1=$s->select();
        $this->assign("list",$arr1);
     */

        import('ORG.Util.Page');// 导入分页类
        $count      = $s->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','个会员学校');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr2=array_reverse($list);
        //dump($arr2);
        $this->assign('list',$arr2);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }

    //添加学校
    public function createschool(){
            import('ORG.Net.UploadFile');

            //上传logo
            $upload = new UploadFile();// 实例化上传类
            //$upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpeg','jpg','png','gif','bmp');// 设置附件上传类型
            $upload->savePath =  './Public/Uploads/schoollogo/';// 设置附件上传目录

           //设置需要生成缩略图，仅对图像文件有效
           $upload->thumb = true;
           //设置需要生成缩略图的文件前缀
           $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
           //设置缩略图最大宽度
           $upload->thumbMaxWidth = '200,60';
           //设置缩略图最大高度
           $upload->thumbMaxHeight = '200,60';
           //设置生成缩略图后移除原图
           $upload->thumbRemoveOrigin = true;

            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
            }


            // 保存表单数据 包括附件数据
            $s = M("School"); // 实例化User对象
            $s->create();// 创建数据对象
            $s->logo = $info[0]['savename']; // 保存上传的照片根据需要自行组装


         /* if((!$s.logo)||(!$s.name)||(!$s.location)||(!$s.intro))
            {
                 $this->error('请把信息填写完整!');

             }
         */


            $count=$s->add(); // 写入用户数据到数据库
            if($count>0){
                $this->success('学校信息添加成功！');
            }else{
                $this->error('对不起,学校信息添加失败~~');
            }
    }

    //修改学校信息
    public function editschool(){
        $id=$_GET['id'];
        $s=M('School');
        $arr=$s->find($id);
        $this->assign('school',$arr);

        $this->display();
    }




    public function updateschool(){

        import('ORG.Net.UploadFile');

        //上传logo
        $upload = new UploadFile();// 实例化上传类
        //$upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpeg','jpg','png','gif','bmp');// 设置附件上传类型
        $upload->savePath =  './Public/Uploads/schoollogo/';// 设置附件上传目录

        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '200,60';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '200,60';
        //设置生成缩略图后移除原图
        $upload->thumbRemoveOrigin = true;

        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }


        // 保存表单数据 包括附件数据
        $s = M("School"); // 实例化User对象
        $s->create(); // 创建数据对象
        $s->logo = $info[0]['savename']; // 保存上传的照片根据需要自行组装

        $count=$s->save(); // 写入用户数据到数据库
        if($count>0){
            $this->success('学校信息修改成功！','schoollist');
        }else{
            $this->error('对不起,学校信息修改失败~~');
        }

    }





    //删除学校
    public function deleteschool(){
            $s=M("School");
            $id=$_GET['id'];
            echo $id;
         $count=$s->delete($id);
        if($count>0)
        {
            $this->success('数据删除成功！');
        }
        else {
            $this->error('数据删除失败!');
        }


        }



}