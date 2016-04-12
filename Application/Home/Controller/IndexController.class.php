<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
//首页视图
    public function index(){
        $this->assign('index',M('wish')->select())->display('index');
    }
//表单处理
    public function handle(){
        $data = array(
            'username'=>I('username','','htmlspecialchars'),
            'content'=>I('content','','htmlspecialchars'),
            'time'=>time()
        );
        // M 模型功能
        if(M('wish')->data($data)->add()){
            $this->success('发布成功','index');
        }else{
            $this->error('发布失败，请重试！');
        }
//删除数据库数据时，必须添加where条件
//        $result = M('wish')->where('id > 0')->delete();
//        var_dump($result);
    }
}