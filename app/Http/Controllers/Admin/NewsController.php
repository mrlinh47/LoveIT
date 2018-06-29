<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\NewsEditRequest;
use App\Models\Cate;
use App\Models\News;
use Auth,File;
use DateTime;
use Response;
class NewsController extends Controller
{
    public function getNewsAdd(){
    	$cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.module.news.add',compact('cate'));
    }
    public function postNewsAdd(NewsAddRequest $request){
    	$news = new News;
    	$file = $request->file('fImages');

    	$news->title = $request->txtTitle;
    	$news->alias = str_slug($request->txtTitle,'-');
    	$news->author = $request->txtAuthor;
    	$news->introtext = $request->txtIntro;
    	$news->fulltext = $request->txtContent;
    	if(strlen($file) > 0){
    		$filename = time().'.'.$file->getClientOriginalName();
    		$destinationPath = 'uploads/news/';
    		$file->move($destinationPath,$filename);
    		$news->image = $filename;
    	}
    	$news->publish = $request->rdoPulish;
    	$news->category_id = $request->sltCate;
    	$news->user_id = Auth::user()->id;
    	$news->created_at = new DateTime();
    	$news->save();
    	return redirect()->route('getNewsList')->with(['flash-level' =>'result_msg','flash_mesage'=>'Thêm tin thành công']);
    }

    public function getNewsList(){
    	$news = News::select('id','title','author','publish','category_id','created_at')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.module.news.list',compact('news'));
    }

    public function getNewsDelete($id){
        $news = News::findOrFail($id);
        $filename = public_path().'/uploads/news/'.$news->image;
        if(file_exists($filename)){
            //unlink(filename);
            File::delete($filename);
        }
        $news->delete();
        return redirect()->route('getNewsList')->with(['flash-level' =>'result_msg','flash_mesage'=>'Xóa thành công']);
    }

    public function getNewsEdit($id){
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
        $news = News::findOrFail($id);
        return view('admin.module.news.edit',compact('news','cate'));
    }

    public function postNewsEdit(NewsEditRequest $request, $id){
        $news = News::findOrFail($id);
        $file = $request->file('fImages');

        $news->title = $request->txtTitle;
        $news->alias = str_slug($request->txtTitle,'-');
        $news->author = $request->txtAuthor;
        $news->introtext = $request->txtIntro;
        $news->fulltext = $request->txtContent;
        if(strlen($file) > 0){
            $fImageCurrent = $request->fImageCurrent;
        if(file_exists(public_path().'/uploads/news/'.$fImageCurrent)){
            //unlink(filename);
            File::delete( public_path().'/uploads/news/'.$fImageCurrent);
        }

            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'uploads/news/';
            $file->move($destinationPath,$filename);
            $news->image = $filename;
        }
        $news->publish = $request->rdoPulish;
        $news->category_id = $request->sltCate;
        $news->user_id = Auth::user()->id;
        $news->updated_at = new DateTime();
        $news->save();
        return redirect()->route('getNewsList')->with(['flash-level' =>'result_msg','flash_mesage'=>'Sửa thành công']);
    }


    //ajax change publish
    public function editStatusNews($id){
        if(request()->ajax()){
            $id = request()->get('id');
            $publish='';
            //echo $id;
            $news = News::find($id);
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
