<?php
namespace App\Repositories\Front;

use App\Models\RootModule;
use App\Models\RootMenu;
use App\Models\RootItem;
use App\Models\RootSeoCase;
use App\Models\RootWebsiteTemplate;

use App\Repositories\Common\CommonRepository;

use Response, Auth, Validator, DB, Exception, Cache;
use QrCode;

class IndexRepository {

    private $model;
    private $repo;
    public function __construct()
    {
//        $this->model = new OrgOrganization;
    }


    // root
    public function root()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

//        $seoCases = RootSeoCase::where(['active'=>1])->orderby('id', 'desc')->limit(6)->get();
//        $websiteTemplates = RootWebsiteTemplate::where(['active'=>1])->orderby('id', 'desc')->limit(8)->get();
//
//        $html = view('frontend.entrance.root')
//            ->with(['info'=>$info, 'menus'=>$menus, 'seoCases'=>$seoCases, 'websiteTemplates'=>$websiteTemplates])->__toString();
//        return $html;

        $html = view('frontend.entrance.new.root')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }




    // services
    public function services()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.new.services')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }

    // service_seo
    public function service_SEO()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.new.service.seo')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }

    // service_PR
    public function service_PR()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.new.service.pr')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }

    // service_AIBully
    public function service_AIBully()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.new.service.bully')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }




    // service_AIBully
    public function join_us()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.new.join')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }




    // about
    public function about()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.new.about')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }

    // about
    public function about_introduction()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.about.introduction')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }
    // about
    public function about_honor()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.about.honor')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }
    // about
    public function about_partner()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.about.partner')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }
    // about
    public function about_layout()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.about.layout')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }
    // about
    public function about_message()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $html = view('frontend.entrance.about.message')
            ->with(['info'=>$info, 'menus'=>$menus])->__toString();
        return $html;
    }




    // 【建站模板】【列表页】
    public function website_templates()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderBy('order', 'asc')->get();

        $websiteTemplates = RootWebsiteTemplate::where(['active'=>1])->orderby('updated_at','desc')->paginate(16);

        $html = view('frontend.entrance.website.templates')
            ->with(['info'=>$info, 'menus'=>$menus, 'websiteTemplates'=>$websiteTemplates])->__toString();
        return $html;
    }

    // 【建站模板】【详情页】
    public function website_template($id)
    {
        $decode_id = decode($id);
        if(intval($decode_id) !== 0 && !$decode_id) dd("地址有误");

        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderBy('order', 'asc')->get();

        $websiteTemplate = RootWebsiteTemplate::where(['active'=>1])->orderby('updated_at','desc')->find($decode_id);

        $html = view('frontend.entrance.website.template')
            ->with(['info'=>$info, 'menus'=>$menus, 'websiteTemplate'=>$websiteTemplate])->__toString();
        return $html;
    }




    // 【SEO案例】【列表页】
    public function seo_cases()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderBy('order', 'asc')->get();

        $seoCases = RootSeoCase::where(['active'=>1])->orderby('id', 'desc')->paginate(16);

        $html = view('frontend.entrance.seo.cases')
            ->with(['info'=>$info, 'menus'=>$menus, 'seoCases'=>$seoCases])->__toString();
        return $html;
    }




}