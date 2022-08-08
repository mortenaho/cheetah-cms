<?php

use App\Repositories\HMPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
///////////////////////////////////////////////////////////////////////////
Route::post("/insert/hm_post",function (Request $request){
    try {
        /// insert to database
        $postRepo = new HMPostRepository();
        $request->request->add(['post_type' => '1']); //add request
        $res = $postRepo->insert($request->only($postRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/edit/hm_post/{id}",function (Request $request,$id){
    try {
        /// insert to database
        $postRepo = new HMPostRepository();
        $request->request->add(['post_type' => '1']); //add request
        $res = $postRepo->updatings($request->only($postRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/delete/hm_post/{id}",function (Request $request,$id){
    try {
        /// delete to database
        DB::table("hm_post")->where("post_code", $id)->delete();
        return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
///////////////////////////////////////////////////////////////////////////
Route::post("/insert/hm_reportage",function (Request $request){
    try {
        /// insert to database
        $postRepo = new HMPostRepository();
        $request->request->add(['post_type' => '2']); //add request
        $res = $postRepo->insert($request->only($postRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/edit/hm_reportage/{id}",function (Request $request,$id){
    try {
        /// insert to database
        $postRepo = new HMPostRepository();
        $request->request->add(['post_type' => '2']); //add request
        $res = $postRepo->updatings($request->only($postRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/delete/hm_reportage/{id}",function (Request $request,$id){
    try {
        /// delete to database
        DB::table("hm_post")->where("post_code", $id)->delete();
        return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
///////////////////////////////////////////////////////////////////////////
Route::post("/insert/category",function (Request $request){
    try {
        /// insert to database
        $catRepo = new \App\Repositories\HMCategoryRepository();
        $res = $catRepo->insert($request->only($catRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/edit/category/{id}",function (Request $request,$id){
    try {
        /// insert to database
        $catRepo = new \App\Repositories\HMCategoryRepository();
        $res = $catRepo->updatings($request->only($catRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/delete/category/{id}",function (Request $request,$id){
    try {
        /// delete to database
        DB::table("category")->where("id", $id)->delete();
        return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
///////////////////////////////////////////////////////////////////////////
Route::post("/insert/subCategory",function (Request $request){
    try {
        /// insert to database
        $subCatRepo = new \App\Repositories\HMHMSubCategoryRepository();
        $subCatRepo->DeleteAll();
        $res = $subCatRepo->insert($request->only($subCatRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/edit/subCategory/{id}",function (Request $request,$id){
    try {
        /// insert to database
        $catRepo = new \App\Repositories\HMHMSubCategoryRepository();
        $res = $catRepo->updatings($request->only($catRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/delete/subCategory/{id}",function (Request $request,$id){
    try {
        /// delete to database
        DB::table("sub_category")->where("id", $id)->delete();
        return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
///////////////////////////////////////////////////////////////////////////
Route::post("/insert/hm_ads",function (Request $request){
    try {
        /// insert to database
        $adsRepo = new \App\Repositories\HMAdsRepository();
        $res = $adsRepo->insert($request->only($adsRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/edit/hm_ads/{id}",function (Request $request,$id){
    try {
        /// insert to database
        $catRepo = new \App\Repositories\HMAdsRepository();
        $res = $catRepo->updatings($request->only($catRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/delete/hm_ads/{id}",function (Request $request,$id){
    try {
        /// delete to database
        DB::table("hm_ads")->where("id", $id)->delete();
        return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
///////////////////////////////////////////////////////////////////////////
///////////////////// back link api//////////////////////////////////////////////////
Route::post("/insert/links",function (Request $request){
    try {
        /// insert to database
        $adsRepo = new \App\Repositories\HMLinksRepository();
        $res = $adsRepo->insert($request->only($adsRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/edit/links/{id}",function (Request $request,$id){
    try {
        /// insert to database
        $catRepo = new \App\Repositories\HMLinksRepository();
        $res = $catRepo->updatings($request->only($catRepo->getFillable()));
        if ($res != null) {
            Cache::forget("HomeIndexView");
            return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
        } else {
            return response()->json(["msg"=>MessageErrorOp],200);
        }
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
Route::post("/delete/links/{id}",function (Request $request,$id){
    try {
        /// delete to database
        DB::table("links")->where("id", $id)->delete();
        return response()->json(["msg"=>MessageSuccessOp,"status"=>true],200);
    } catch (\Exception $exp) {
        return response()->json(["msg"=>$exp->getMessage()],500);
    }
});
