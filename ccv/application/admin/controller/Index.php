<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Db;
use \think\Route;
use \think\Request;
use \think\Session;

class Index extends Base
{
	use \traits\controller\Jump;
    public function index()
    {
    	 $data         = session('adminlogin');
        $userid     = $data['adminId'];    
    	$userdata 	= db('administrator')->where(array('admin_id'=>$userid))->find();
    	$this->assign('data',$userdata);
        return $this->fetch();
    }
    public function mycore(){
         $data      = session('adminlogin');
        $userid     = $data['adminId'];    
        $userdata   = db('administrator')->where(array('admin_id'=>$userid))->find();
        $addr=db('user_ip')->where(array('user_id'=>$userid))->order('start_time desc')->limit(2)->field('ip_address,start_time')->select();
        
        $this->assign('data',$userdata);
        $this->assign('addr',$addr[1]);
    	return $this->fetch();
    }
}
