<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\MenuTempRequest;
use App\Models\MenuTemp;
use App\Repositories\MenuRepository;
use App\Repositories\MenuTempRepository;
use App\Repositories\PostRepository;
use App\Repositories\ToolsRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\View;


class MenuTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'menu');
    }


    public function store(MenuTempRequest $request)
    {
        try {
            /// insert to database
            $menuRepo = new MenuTempRepository();
            $res = $menuRepo->insert($request->only($menuRepo->getFillable()));
            if ($res != null) {
                $msg = AdminHelper:: adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                AdminHelper::TempData("msg", $msg);
            }
            return redirect("/admin/menu");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/menu");
        }
    }

    public function show($id)
    {
        try {
            $menu = MenuTemp::find($id);
            if ($menu)
                return view("admin.menu.edit", compact('menu'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/menu");
        }
    }

    public function edit($id)
    {
        try {
            $menu = MenuTemp::find($id);
            if ($menu) {
                $catRep = new MenuTempRepository();
                $categories = $catRep->getByType($menu->type);
                $htmlMenu = \view()->make("admin.menu._menu", compact("categories"))->render();
                return view("admin.menu.edit", compact('menu', 'htmlMenu'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/menu");
        }
    }

    public function update(MenuTempRequest $request, $id)
    {
        try {
            /// insert to database
            $menuRepo = new MenuTempRepository();
            $menuRepo->updatings($request->only($menuRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
        }
        return redirect("/admin/menu");
    }

    public function destroy($id)
    {
        try {
            $menuRepo = new MenuTempRepository();
            $res = $menuRepo->DeleteMenu($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "این دسته بندی دارای فرزند میباشد و نمیتوانید آن را حذف کنید"], 200);
            else
                return response()->json(["status" => "false", "msg" => "خطایی در حذف اطلاعات رخ داده است."], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function changeStatus($id)
    {
        try {
            $menuRepo = new MenuTempRepository();
            if ($menuRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function getMenuByType($type)
    {
        try {
            $menuRepo = new MenuTempRepository();
            $categories = $menuRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.menu._menu", compact("categories"))->render();
                return response()->json(["status" => "true", "html" => "$html"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function getPosts(Request $request)
    {
        try {
            $menuRepo = new PostRepository();
            $posts = $menuRepo->getPos($request->title, $request->post_type);
            if (count($posts) > 0) {
                $html = view()->make("admin.menu._post_title", compact("posts"))->render();
                return response()->json(["status" => "true", "html" => "$html"], 200);
            } else
                return response()->json(["status" => "true", "html" => "<p>چیزی یافت نشد</p>"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function addMenu(Request $request)
    {
        try {
            $menuRepo = new MenuTempRepository();
            $parent = $request->parent;
            $title = $request->title;
            $link = $request->link_address;
            $lang = $request->lang;
            $id = $request->id;
            $ordering = $request->ordering;

            $data = [];
            $data["title"] = $title;
            $data["url_slug"] = create_url_slug($title);
            $data["parent"] = $parent;
            $data["language"] = $lang;
            $data["link_address"] = $link;
            $data["ordering"] = $ordering;

            if ($id > 0) {
                $data["id"] = $id;
                $posts = $menuRepo->updatings($data, $id);
            } else {
                $posts = $menuRepo->insert($data);
            }


            if ($posts["id"] > 0) {
                return response()->json(["status" => "true", "id" => $posts["id"], "ordering" => $posts["ordering"]], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function orderMenu(Request $request)
    {
        try {
            $data = $request->data;
            if ($data != null && count($data) > 0) {
                $menuRepo = new MenuTempRepository();
                for ($i = 1; $i < count($data); $i++) {
                    $param = ["id" => $data[$i]["id"], "parent" => $data[$i]["parent"], "ordering" => $data[$i]["ordering"]];
                    $menuRepo->updatings($param, $data[$i]["id"]);
                }
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function menuEditTitle(Request $request)
    {
        try {
            $id = $request->pk;
            $title =trim($request->value);

            $menuRepo = new MenuTempRepository();
            if ($title != null && strlen($title) > 3) {
                if ($menuRepo->updatings(["title" => $title, "url_slug" => create_url_slug($title), "id" => $id], $id)) {
                    return response()->json(["status" => "true", "title" => $title], 200);
                } else
                    return response()->json(["status" => "false"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

}
