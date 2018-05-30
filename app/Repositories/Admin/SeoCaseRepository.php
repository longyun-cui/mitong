<?php
namespace App\Repositories\Admin;

use App\Models\RootModule;
use App\Models\RootMenu;
use App\Models\RootItem;

use App\Models\RootSeoCase;

use App\Repositories\Common\CommonRepository;
use App\Repositories\RootCommonRepository;

use Response, Auth, Validator, DB, Exception, Cache;
use QrCode;

class SeoCaseRepository {

    private $model;
    private $repo;
    private $commonRepo;
    private $rootCommonRepo;
    public function __construct()
    {
        $this->model = new RootSeoCase;
        $this->commonRepo = new CommonRepository();
        $this->rootCommonRepo = new RootCommonRepository();
    }

    // 返回【列表】数据（DataTable）
    public function get_list_datatable($post_data)
    {
        $admin = Auth::guard('admin')->user();
        $query = RootSeoCase::select("*")->with(['admin','pivot_menus']);
        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 20;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("updated_at", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->encode_id = encode($v->id);
            foreach ($v->pivot_menus as $key => $val)
            {
                $val->encode_id = encode($val->id);
            }
        }
        return datatable_response($list, $draw, $total);
    }



    // 返回【添加】视图
    public function view_create()
    {
        $admin = Auth::guard('admin')->user();
        $menus = RootMenu::get();
        return view('admin.seo.case.edit')->with(['operate'=>'create', 'encode_id'=>encode(0), 'menus'=>$menus]);
    }

    // 返回【编辑】视图
    public function view_edit()
    {
        $id = request("id",0);
        $decode_id = decode($id);
        if(!$decode_id) return response("参数有误", 404);

        if($decode_id == 0)
        {
            return view('admin.seo.case.edit')->with(['operate'=>'create', 'encode_id'=>$id]);
        }
        else
        {
            $menus = RootMenu::get();
            $mine = RootSeoCase::with([
                'menu',
            ])->find($decode_id);
            if($mine)
            {
                unset($mine->id);
                $mine->custom = json_decode($mine->custom);
                return view('admin.seo.case.edit')->with(['operate'=>'edit', 'encode_id'=>$id, 'menus'=>$menus, 'data'=>$mine]);
            }
            else return response("该产品不存在！", 404);
        }
    }

    // 【保存】数据
    public function save($post_data)
    {
        $messages = [
            'encode_id.required' => '参数有误',
            'name.required' => '请输入标题',
        ];
        $v = Validator::make($post_data, [
            'encode_id' => 'required',
            'name' => 'required'
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        $admin = Auth::guard('admin')->user();

        $decode_id = decode($post_data["encode_id"]);
        if(intval($decode_id) !== 0 && !$decode_id) return response_error();


        // 判断操作类型
        $operate = $post_data["operate"];
        if($operate == 'create') // 添加 ( $id==0，添加一个新的产品 )
        {
            $mine = new RootSeoCase;
            $post_data["admin_id"] = $admin->id;
        }
        else if($operate == 'edit') // 编辑
        {
            $mine = RootSeoCase::find($decode_id);
            if(!$mine) return response_error([],"该模板不存在，刷新页面重试");
            if($mine->admin_id != $admin->id) return response_error([],"你没有操作权限");
        }
        else return response_error([],"参数有误");

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $post_data['custom'] = json_encode($post_data['custom']);

            $bool = $mine->fill($post_data)->save();
            if($bool)
            {
                if(!empty($post_data["menus"]))
                {
//                $mine->pivot_menus()->attach($post_data["menus"]);
                    $mine->pivot_menus()->syncWithoutDetaching($post_data["menus"]);
                }

                $encode_id = encode($mine->id);

                // 封面图片
                if(!empty($post_data["cover"]))
                {
                    // 删除原封面图片
                    $mine_cover_pic = $mine->cover_pic;
                    if(!empty($mine_cover_pic) && file_exists(storage_path("resource/" . $mine_cover_pic)))
                    {
                        unlink(storage_path("resource/" . $mine_cover_pic));
                    }

                    $upload = new CommonRepository();
                    $result = $upload->upload($post_data["cover"], 'root-unique-seos' , 'cover_seo_'.$encode_id);
                    if($result["status"])
                    {
                        $mine->cover_pic = $result["data"];
                        $mine->save();
                    }
                    else throw new Exception("upload-cover-fail");
                }


//                $url = config('common.host.'.env('APP_ENV').'.cdn').'/website/template/'.$encode_id;  // 目标URL
//                // 保存位置
//                $qr_code_path = 'resource/root/unique/seo';
//                if(!file_exists(storage_path($qr_code_path))) mkdir(storage_path($qr_code_path), 0777, true);
//                // qr_code图片文件
//                $qr_code = $qr_code_path.'/qr_code_template_'.$encode_id.'.png';
//                QrCode::errorCorrection('H')->format('png')->size(160)->margin(0)->encoding('UTF-8')->generate($url, storage_path($qr_code));

//                $organization = OrgOrganization::find($admin->org_id);
//                $create = new CommonRepository();
//                $org_name = $organization->name;
//                $logo_path = '/resource/'.$organization->logo;
//                $title = $mine->title;
//                $name = $qr_code_path.'/qr_code__template_'.$encode_id.'.png';
//                $create->create_qrcode_image($org_name, '内容', $title, $qr_code, $logo_path, $name);
            }
            else throw new Exception("insert--template--fail");

            DB::commit();

//            $this->rootCommonRepo->set_cache_root_is_refresh();

            return response_success(['id'=>$encode_id]);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '操作失败，请重试！';
//            $msg = $e->getMessage();
//            exit($e->getMessage());
            return response_fail([],$msg);
        }
    }



    // 【删除】
    public function delete($post_data)
    {
        $admin = Auth::guard('admin')->user();
        $id = decode($post_data["id"]);
        if(intval($id) !== 0 && !$id) return response_error([],"该内容不存在，刷新页面试试");

        $mine = RootSeoCase::find($id);
        if($mine->admin_id != $admin->id) return response_error([],"你没有操作权限");

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $content = $mine->content;
            $cover_pic = $mine->cover_pic;

            $mine->pivot_menus()->detach();
            $bool = $mine->delete();
            if(!$bool) throw new Exception("delete--template--fail");

            DB::commit();

//            $this->rootCommonRepo->set_cache_root_is_refresh();

            // 删除UEditor图片
            $img_tags = get_html_img($content);
            foreach ($img_tags[2] as $img)
            {
                if (!empty($img) && file_exists(public_path($img)))
                {
                    unlink(public_path($img));
                }
            }

            // 删除封面图片
            if(!empty($cover_pic) && file_exists(storage_path("resource/" . $cover_pic)))
            {
                unlink(storage_path("resource/" . $cover_pic));
            }

            return response_success([]);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '删除失败，请重试';
            return response_fail([],$msg);
        }
    }

    // 【启用】
    public function enable($post_data)
    {
        $admin = Auth::guard('admin')->user();
        $id = decode($post_data["id"]);
        if(intval($id) !== 0 && !$id) return response_error([],"该内容不存在，刷新页面试试");

        $mine = RootSeoCase::find($id);
        if($mine->admin_id != $admin->id) return response_error([],"你没有操作权限");
        DB::beginTransaction();
        try
        {
            $update["active"] = 1;
            $bool = $mine->fill($update)->save();
            if(!$bool) throw new Exception("update--template--fail");

            DB::commit();

//            $this->rootCommonRepo->set_cache_root_is_refresh();

            return response_success([]);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '启用失败，请重试';
            return response_fail([],$msg);
        }
    }

    // 【禁用】
    public function disable($post_data)
    {
        $admin = Auth::guard('admin')->user();
        $id = decode($post_data["id"]);
        if(intval($id) !== 0 && !$id) return response_error([],"该内容不存在，刷新页面试试");

        $mine = RootSeoCase::find($id);
        if($mine->admin_id != $admin->id) return response_error([],"你没有操作权限");
        DB::beginTransaction();
        try
        {
            $update["active"] = 9;
            $bool = $mine->fill($update)->save();
            if(!$bool) throw new Exception("update--template--fail");

            DB::commit();

//            $this->rootCommonRepo->set_cache_root_is_refresh();

            return response_success([]);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '禁用失败，请重试';
            return response_fail([],$msg);
        }
    }



    // 【select2】
    public function select2_menus($post_data)
    {
        $admin = Auth::guard('admin')->user();
        if(empty($post_data['keyword']))
        {
            $list =RootMenu::select(['id','title as text'])->where(['org_id'=>$admin->id])->orderBy('id','desc')->get()->toArray();
        }
        else
        {
            $keyword = "%{$post_data['keyword']}%";
            $list =RootMenu::select(['id','title as text'])->where(['org_id'=>$admin->id])->where('title','like',"%$keyword%")
                ->orderBy('id','desc')->get()->toArray();
        }
        return $list;
    }



}