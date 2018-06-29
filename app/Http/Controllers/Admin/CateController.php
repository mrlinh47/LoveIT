<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;
use App\Models\Cate;
use DateTime;
use Response;
class CateController extends Controller
{
    public function getCateAdd(){
    	$data = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.module.category.add',compact('data'));
    }
    public function postCateAdd(CateAddRequest $request){
    	$cate = new Cate;
    	$cate->name = $request->txtCateName;
    	$cate->alias = str_slug($request->txtCateName,'-');
    	$cate->parent_id = $request->sltCate;
    	$cate->created_at = new DateTime();
    	$cate->publish = $request->rdoPublish;
    	$cate->save();
    	return redirect()->route('getCateList')->with(['flash-level' =>'result_msg','flash_mesage'=>'Thêm danh mục thành công']);
    }

    public function getCateList(){
    	$data = Cate::select('id','name','parent_id','publish')->get()->toArray();
		return view('admin.module.category.list',compact('data'));
    }
    public function getCateDelete($id){
    	$parent = Cate::where('parent_id',$id)->count();
    //	if($parent == 0){
    		$cate = Cate::find($id);
    		$cate->delete($id);
    		return redirect()->route('getCateList')->with(['flash-level' =>'result_msg','flash_mesage'=>'Xóa danh mục thành công']);
    	//}else{
    		//echo 'no';
    	//}

    }
    //edit
    public function getCateEdit($id){
    	$parent = Cate::findOrFail($id)->toArray();
    	$data = Cate::select('id','name','parent_id','publish')->get()->toArray();
    	return view('admin.module.category.edit',compact('parent','data'));
    }
    public function postCateEdit(CateEditRequest $request, $id){
    	$cate = Cate::find($id);
    	$cate->name = $request->txtCateName;
    	$cate->alias = str_slug($request->txtCateName,'-');
    	$cate->parent_id = $request->sltCate;
    	$cate->updated_at = new DateTime();
    	$cate->publish = $request->rdoPublish;
    	$cate->save();
    	return redirect()->route('getCateList')->with(['flash-level' =>'result_msg','flash_mesage'=>'Sửa danh mục thành công']);
    }

    //ajax change publish
    public function editPubishsCate($id){
        if(request()->ajax()){
            $id = request()->get('id');
            $publish='';
            //echo $id;
            $news = Cate::find($id);
            if($news->publish == 0){
                $news->publish = 1;
                $publish=1;

            }else{
                $news->publish = 0;
                $publish=0;
            }
            
            $news->save();
            return Response::json(array('publish'=>$publish));
        }
    }
}
