<?php
// 本类由系统自动生成，仅供测试用途
class MatchAction extends CommonAction {
    public function addmatch(){
        $u=M("Union");
        $arr1=$u->select();
        //dump($arr1);
        $this->assign("union",$arr1);
        $this->display();
    }

    public function addathlete(){
        $t=M("Match");
        $arrmatch=$t->select();
        $this->assign("match",$arrmatch);
        $this->display();
    }

    public function addrankboy(){
        $this->display();
    }

    public function addrankgirl(){
        $this->display();
    }

    public function addteam(){
        $m=M("Match");
        $arr1=$m->select();
        //dump($arr1);
        $this->assign("matchlist",$arr1);
        $this->display();
    }

    public function addunion(){
        $u=M("Union");
        $arr2=$u->select();
        //dump($arr2);
        $this->assign('data',$arr2);
        $this->display();
    }

    public function athletelist(){
        $t=M("Team");
        $id=$_GET['id'];
        $arr1=$t->query("select * from d_team where id='$id'  ");
        $teamname=$arr1[0]['teamname'];
        $matchname=$arr1[0]['matchname'];

        $m=M("Member");
        $arr2=$m->query("select * from d_member where teamname='$teamname' and matchname='$matchname' order by id ");
        $this->assign("memberlist",$arr2);
        $this->display();
    }

    public function matchlist(){
        $m=M("Match");
   //   $arr1=$m->select();
   //   $arr2=array_reverse($arr1);
   //   $this->assign("matchlist",$arr2);
     // $User = M('User'); // 实例化User对象
        import('ORG.Util.Page');// 导入分页类
        $count      = $m->count();// 查询满足要求的总记录数
        $Page       = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $m->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('matchlist',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }

/*
    public function teamlist(){
        $t=M("Team");

        //$User = M('User'); // 实例化User对象
        import('ORG.Util.Page');// 导入分页类
        $count      = $t->count();// 查询满足要求的总记录数
        $Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('teamlist',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

       // $arr3=$t->select();
       // $this->assign("teamlist",$arr3);
        $this->display();
    }
*/

    public function teamlist(){
        $inserttime=$_GET['inserttime'];
        $m=M("Match");
        $arrmatch=$m->find($inserttime);
       // dump($arrmatch);
        $this->assign("match",$arrmatch);
        $matchname=$arrmatch['matchname'];

        //呈现所有参赛球队
        $t=M("Team");
        // $arrteam=$t->query("select * from d_team where matchname='$matchname' order by teamname");
        // $this->assign("team",$arrteam);
        // $u = M('User'); // 实例化User对象
        import('ORG.Util.Page');// 导入分页类
        $count      = $t->where("matchname='$matchname' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where("matchname='$matchname' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
        $this->assign('team',$list1);// 赋值数据集
        $this->assign('page1',$show);// 赋值分页输出
        // $this->display(); // 输出模板


        //呈现华南球队
        //$arr5=$t->query("select * from d_team where matchname='$matchname' and location='华南' order by teamname");
        //$this->assign("huanan",$arr5);
        // $User = M('User'); // 实例化User对象
        //import('ORG.Util.Page');// 导入分页类
        $count      = $t->where( " matchname='$matchname' and location='华南' ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where("matchname='$matchname' and location='华南' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
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
        $list = $t->where("matchname='$matchname' and location='华北' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
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
        $list = $t->where("matchname='$matchname' and location='西北' ")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=array_reverse($list);
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

        $this->display();
    }

    //更新男生比赛排名
    public function saveboyresult(){
        $r=M("Result");
        $data['matchname']=$_POST['matchname'];
        $data['one']=$_POST['one'];
        $data['two']=$_POST['two'];
        $data['three']=$_POST['three'];
        $data['four']=$_POST['four'];
        $data['five']=$_POST['five'];
        $data['six']=$_POST['six'];
        $data['seven']=$_POST['seven'];
        $data['eight']=$_POST['eight'];

      //  $r->create();
        $data['id']=1;
        //dump($data);
        $result=(!$data['matchname'])||(!$data['one'])||(!$data['two'])||(!$data['three'])
            ||(!$data['four'])||(!$data['five'])||(!$data['six'])||(!$data['seven'])||(!$data['eight']);
        if($result){
            $this->error('请把信息填写完整!');
        }

        $count=$r->save($data);
        if($count>0){
            $this->success("数据加入成功!");
        }
        else{
            $this->error("数据加入失败!");
        }

    }

    //更新女生比赛排名
    public function savegirlresult(){
        $r=M("Result");
          $data['matchname']=$_POST['matchname'];
          $data['one']=$_POST['one'];
          $data['two']=$_POST['two'];
          $data['three']=$_POST['three'];
          $data['four']=$_POST['four'];
          $data['five']=$_POST['five'];
          $data['six']=$_POST['six'];
          $data['seven']=$_POST['seven'];
          $data['eight']=$_POST['eight'];

       // $r->create();
        $data['id']=2;
        //dump($data);

        $result=(!$data['matchname'])||(!$data['one'])||(!$data['two'])||(!$data['three'])
            ||(!$data['four'])||(!$data['five'])||(!$data['six'])||(!$data['seven'])||(!$data['eight']);
        if($result){
            $this->error('请把信息填写完整!');
        }

        $count=$r->save($data);
        if($count>0){
            $this->success("数据加入成功!");
        }
        else{
            $this->error("数据加入失败!");
        }

    }

    //添加联赛名字
    public function createunion(){
        $u=M("Union");
        $data['unionname']=$_POST['unionname'];

        if(!$data['unionname'])
        {
            $this->error('请填写联赛的名字!');
        }

      //  $u->create();
        $count=$u->add($data);
        //dump($data);

        if($count>0){
            $this->success("数据加入成功!");
        }
        else{

            $this->error("数据加入失败!");
        }
    }

    //删除联赛名字
    public function delunion(){
        $u=M("Union");
        $id=$_GET['id'];
        //dump($data);
        $count=$u->delete($id);
        if($count>0){
            $this->success("数据删除成功!");
        }
        else{

            $this->error("数据删除失败!");
        }
    }

    //添加比赛
    public function creatematch(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        //$upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        //$upload->saveRule = uniqid;
        //这里的时间是根据上传的图片的多少来自动改变图片的名称的（并且时间都不同，所以上传的图片的名称就不会相同）

        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '870,870';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '210,210';
        //设置生成缩略图后移除原图
        $upload->thumbRemoveOrigin = true;


        $upload->savePath =  './Public/Uploads/matchimage/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }

        $m=M("Match");
        $data['sdate']=$_POST['sdate'];
        $data['edate']=$_POST['edate'];
        $data['location']=$_POST['location'];
        $data['intro']=$_POST['intro'];
        $data['rule']=$_POST['rule'];
        $data['unionname']=$_POST['unionname'];
        $data['matchname']=$_POST['matchname'];
        //$m->create();
        $data['inserttime']=time();
        $data['imagename'] = $info[0]['savename']; // 保存上传的照片根据需要自行组装
       // dump($data);

        $result=(!$data['sdate'])||(!$data['edate'])||(!$data['location'])||(!$data['intro'])
            ||(!$data['rule'])||(!$data['unionname'])||(!$data['matchname']);
        if($result)
        {
            $this->error('请把信息填写完整!') ;
        }

        $count=$m->add($data); // 写入用户数据到数据库

        if($count>0)
        {
            $this->success('数据保存成功！');
        }
        else {
            $this->error('数据保存失败!');

        }


    }


    //删除比赛
    public function deletematch(){
        $m=M("Match");
        $inserttime=$_GET["inserttime"];
        $count=$m->delete($inserttime);
        if($count>0){
            $this->success("数据删除成功!");
        }
        else{

            $this->error("数据删除失败!");
        }
    }


    //编辑比赛
    public function editmatch(){
        $m=M("Match");
        $inserttime=$_GET["inserttime"];
        $arr=$m->find($inserttime);
       // dump($arr);
        $this->assign('match',$arr);

        $u=M("Union");
        $arr1=$u->select();
        //dump($arr1);
        $this->assign("union",$arr1);

        $this->display();
    }

    public function updatematch(){

        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        //$upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        //$upload->saveRule = uniqid;
        //这里的时间是根据上传的图片的多少来自动改变图片的名称的（并且时间都不同，所以上传的图片的名称就不会相同）

        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '870,870';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '210,210';
        //设置生成缩略图后移除原图
        $upload->thumbRemoveOrigin = true;


        $upload->savePath =  './Public/Uploads/matchimage/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }

        $m=M("Match");
        $data['sdate']=$_POST['sdate'];
        $data['edate']=$_POST['edate'];
        $data['location']=$_POST['location'];
        $data['intro']=$_POST['intro'];
        $data['rule']=$_POST['rule'];
        $data['unionname']=$_POST['unionname'];
        $data['matchname']=$_POST['matchname'];
        //$m->create();
        $data['inserttime']=$_POST['inserttime'];
        $data['imagename'] = $info[0]['savename']; // 保存上传的照片根据需要自行组装
         //dump($data);

        $count=$m->save($data);
        if($count>0){
            $this->success('比赛修改成功!','matchlist');
        }else{
            $this->error('比赛修改失败!');
        }

    }

    //添加队伍
    public function createteam(){

        //$upload->saveRule = uniqid;
        //这里的时间是根据上传的图片的多少来自动改变图片的名称的（并且时间都不同，所以上传的图片的名称就不会相同）
/*

*/

        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        //$upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('pdf','xls', 'doc', 'txt','xlsx','docx');// 设置附件上传类型

        $upload->savePath =  './Public/Uploads/memberlist/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        // 保存表单数据 包括附件数据
        $t = M("Team"); // 实例化User对象
        $t->create(); // 创建数据对象
        $t->memberlist = $info[0]['savename']; // 保存上传的照片根据需要自行组装
        $t->add(); // 写入用户数据到数据库
        $this->success('队伍添加成功！');


     }

     //删除参赛队伍
     public function deleteteam(){
         $t=M("Team");
         $id=$_GET["id"];
         $count=$t->delete($id);
         if($count>0){
             $this->success("已成功删除该队伍!");
         }
         else{

             $this->error("对不起,队伍删除失败~~");
         }

     }

     //编辑参赛队伍
     public function editteam(){
         $m=M("Match");
         $arr1=$m->select();
         //dump($arr1);
         $this->assign("matchlist",$arr1);

         $t=M("Team");
         $id=$_GET["id"];
         $arr2=$t->find($id);
         // dump($arr);
         $this->assign('team',$arr2);

         $this->display();
     }

    public function updateteam(){


        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        //$upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('pdf','xls', 'doc', 'txt');// 设置附件上传类型

        $upload->savePath =  './Public/Uploads/memberlist/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        // 保存表单数据 包括附件数据
        $t = M("Team"); // 实例化User对象
        $t->create(); // 创建数据对象
        $t->memberlist = $info[0]['savename']; // 保存上传的照片根据需要自行组装
        $t->save(); // 写入用户数据到数据库
        $this->success('队伍信息修改成功！','teamlist');


    }


     //添加队员信息
     public function createmember(){
         import('ORG.Net.UploadFile');
         $upload = new UploadFile();// 实例化上传类
         //$upload->maxSize  = 3145728 ;// 设置附件上传大小
         $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
         //$upload->saveRule = uniqid;
         //这里的时间是根据上传的图片的多少来自动改变图片的名称的（并且时间都不同，所以上传的图片的名称就不会相同）

         //设置需要生成缩略图，仅对图像文件有效
         $upload->thumb = true;
         //设置需要生成缩略图的文件前缀
         $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
         //设置缩略图最大宽度
         $upload->thumbMaxWidth = '200,114';
         //设置缩略图最大高度
         $upload->thumbMaxHeight = '200,157';
         //设置生成缩略图后移除原图
         $upload->thumbRemoveOrigin = true;

         $upload->savePath =  './Public/Uploads/memberpicture/';// 设置附件上传目录
         if(!$upload->upload()) {// 上传错误提示错误信息
             $this->error($upload->getErrorMsg());
         }else{// 上传成功 获取上传文件信息
             $info =  $upload->getUploadFileInfo();
         }

         $m=M("Member");
         $m->create();
         $m->picture = $info[0]['savename']; // 保存上传的照片根据需要自行组装
         $count=$m->add(); // 写入用户数据到数据库

         if($count>0)
         {
             $this->success('该队员成功添加啦！');
         }
         else {
             $this->error('对不起啊,没能成功添加该队员~~');
         }
     }


      //编辑队员信息
     public function editmember(){
         $m=M("Match");
         $arr1=$m->select();
         $this->assign("match",$arr1);

         $m=M("Member");
         $id=$_GET["id"];
         $arr2=$m->find($id);
         // dump($arr);
         $this->assign('member',$arr2);

         $this->display();

     }



     public function updatemember(){
         import('ORG.Net.UploadFile');
         $upload = new UploadFile();// 实例化上传类
         //$upload->maxSize  = 3145728 ;// 设置附件上传大小
         $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
         //$upload->saveRule = uniqid;
         //这里的时间是根据上传的图片的多少来自动改变图片的名称的（并且时间都不同，所以上传的图片的名称就不会相同）

         //设置需要生成缩略图，仅对图像文件有效
         $upload->thumb = true;
         //设置需要生成缩略图的文件前缀
         $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
         //设置缩略图最大宽度
         $upload->thumbMaxWidth = '200,114';
         //设置缩略图最大高度
         $upload->thumbMaxHeight = '200,157';
         //设置生成缩略图后移除原图
         $upload->thumbRemoveOrigin = true;

         $upload->savePath =  './Public/Uploads/memberpicture/';// 设置附件上传目录
         if(!$upload->upload()) {// 上传错误提示错误信息
             $this->error($upload->getErrorMsg());
         }else{// 上传成功 获取上传文件信息
             $info =  $upload->getUploadFileInfo();
         }

         $m=M("Member");
         $m->create();
         $m->picture = $info[0]['savename']; // 保存上传的照片根据需要自行组装
         $count=$m->save(); // 写入用户数据到数据库

         if($count>0)
         {
             $this->success('该队员信息成功修改啦！','athletelist');
         }
         else {
             $this->error('对不起啊,没能成功修改该队员信息~~');
         }



     }

     //删除队员
    public function deletemember(){
        $m=M("Member");
        $id=$_GET["id"];
        $count=$m->delete($id);
        if($count>0){
            $this->success("成功删除该队员的信息!");
        }
        else{

            $this->error("对不起,删除失败了~~");
        }
    }

}