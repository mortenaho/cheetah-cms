<?php

namespace App\Http\Controllers\Customer;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContactUs;
use App\Models\HMAds;
use App\Models\HMPost;
use App\Models\Menu;
use App\Models\OrdersModel;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class DataTableController extends Controller
{

    public function orders()
    {
        $user_id = auth()->id();
        $orders = OrdersModel::select("id", "user_id", "customer_name", "customer_mobile", "customer_address", "payment_status", "total_price", "description", "register_date", "status")
            ->where("user_id", $user_id)
            ->orderBy("id", "desc");
        return Datatables::of($orders)->make(true);
    }
}
