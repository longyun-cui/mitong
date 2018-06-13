<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Front\IndexRepository;

class IndexController extends Controller
{

    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new IndexRepository;
    }



    // 返回【主页】视图
    public function view_root()
    {
        return $this->repo->root();
    }


    // 返回【服务】视图
    public function view_services()
    {
        return $this->repo->services();
    }
    // 返回【服务】视图
    public function view_service_SEO()
    {
        return $this->repo->service_SEO();
    }
    // 返回【服务】视图
    public function view_service_PR()
    {
        return $this->repo->service_PR();
    }
    // 返回【服务】视图
    public function view_service_AIBully()
    {
        return $this->repo->service_AIBully();
    }


    // 返回【加盟】视图
    public function view_join_us()
    {
        return $this->repo->join_us();
    }


    // 返回【关于】视图
    public function view_about()
    {
        return $this->repo->about();
    }
    // 返回【关于】视图
    public function view_about_introduction()
    {
        return $this->repo->about_introduction();
    }
    // 返回【关于】视图
    public function view_about_honor()
    {
        return $this->repo->about_honor();
    }
    // 返回【关于】视图
    public function view_about_partner()
    {
        return $this->repo->about_partner();
    }
    // 返回【关于】视图
    public function view_about_layout()
    {
        return $this->repo->about_layout();
    }
    // 返回【关于】视图
    public function view_about_message()
    {
        return $this->repo->about_message();
    }




    // 返回【建站模板】【列表页】视图
    public function view_website_templates()
    {
        return $this->repo->website_templates();
    }
    // 返回【建站模板】【详情页】视图
    public function view_website_template($id)
    {
        return $this->repo->website_template($id);
    }




    // 返回【SEO案例】【列表页】视图
    public function view_seo_cases()
    {
        return $this->repo->seo_cases();
    }




}
