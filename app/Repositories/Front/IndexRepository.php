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

    //
    public function index()
    {
        $info = json_decode(json_encode(config('mitong.company.info')));
        $menus = RootMenu::where(['active'=>1])->orderby('order', 'desc')->get();

        $seoCases = RootSeoCase::where(['active'=>1])->orderby('id', 'desc')->limit(6)->get();
        $websiteTemplates = RootWebsiteTemplate::where(['active'=>1])->orderby('id', 'desc')->limit(8)->get();

        return view('frontend.entrance.index')
            ->with(['info'=>$info, 'menus'=>$menus, 'seoCases'=>$seoCases, 'websiteTemplates'=>$websiteTemplates]);
    }



    //
    public function website_templates()
    {
        $info = json_decode(json_encode(config('outside.company.info')));
        $org = $info;

        $templates = OutsideTemplate::where(['active'=>1])->orderby('updated_at','desc')->paginate(16);

        $menus = OutsideMenu::with([
//            'items'=>function ($query1) { $query1->where('active', 1)->orderBy('updated_at', 'desc'); }
        ])->where('active', 1)->orderBy('order', 'asc')->get();


        $html = view('outside.frontend.vipp.entrance.website.templates')
            ->with(['org'=>$org,'info'=>$info,'menus'=>$menus,'templates'=>$templates])->__toString();

        return $html;
    }

    //
    public function website_template($id)
    {
        $info = json_decode(json_encode(config('outside.company.info')));
        $org = $info;

        $decode_id = decode($id);
        if(intval($decode_id) !== 0 && !$decode_id) dd("地址有误");

        $template = OutsideTemplate::where(['active'=>1])->orderby('updated_at','desc')->find($decode_id);

        $menus = OutsideMenu::with([
//            'items'=>function ($query1) { $query1->where('active', 1)->orderBy('updated_at', 'desc'); }
        ])->where('active', 1)->orderBy('order', 'asc')->get();


        $html = view('outside.frontend.vipp.entrance.website.template')
            ->with(['org'=>$org,'info'=>$info,'menus'=>$menus,'template'=>$template])->__toString();

        return $html;
    }




}