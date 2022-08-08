<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\VisitRequest;
use App\Models\Category;
use App\Models\Visit;
use App\Repositories\VisitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Monolog\Logger;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'statistics');
    }

    public function index()
    {
        return view('admin.statistics.index');
    }

    public function details($id)
    {
        try {
            date_default_timezone_set('Asia/Tehran');
            $end_date = date("Y-m-d H:i:s");
            $start_date = date('Y-m-d H:i:s', strtotime("-6 months", strtotime($end_date)));

            $visits = Visit::select("id", "post_type", "category_id", "post_id", "year_month", "user_ip", "browser_name", "browser_version", "device_type", "device_name", "visit_type", "visitor_session_time", "status")
                ->where('created_at', '>', $start_date)
                ->where('created_at', '<=', $end_date)
                ->orderBy("created_at", "desc")
                ->get();


            if ($visits) {


                $browsers = $this->_group_by($visits, "browser_name");
                $browserData = array();
                foreach ($browsers as $key => $value) {
                    array_push($browserData, [$key, count($value)]);
                }

                $devices = $this->_group_by($visits, "device_type");
                $deviceData = array();
                foreach ($devices as $key => $value) {
                    array_push($deviceData, [$key, count($value)]);
                }

                $monthlyVisits = $this->_group_by($visits, "year_month");
                $monthlyVisitData = array();
                $monthlyVisitCategories = array();
                for ($i = 0; $i <=6 ; $i++) {
                    $c_date = date('Y-m-d', strtotime("+{$i} months", strtotime($start_date)));
                    $c_date= gregorian_to_jalali(substr($c_date,0,4),substr($c_date,5,2),substr($c_date,8,2));
                    $ym = $c_date[0] . $c_date[1];
                    if($c_date[1] < 10 ){
                        $ym = $c_date[0] . '0'. $c_date[1];
                    }
                    array_push($monthlyVisitCategories, $ym);

                    $val = 0;
                    foreach ($monthlyVisits as $key => $value) {
                        if ($key == $ym) {
                            $val = count($value);
                        }
                    }

                        array_push($monthlyVisitData, [$this->convertYearMonthToMonthName($ym),  $val]);

                }


                $postTypesVisit = $this->_group_by($visits, "post_type");
                $postTypesVisitData = array();
                foreach ($postTypesVisit as $key => $value) {
                    array_push($postTypesVisitData, [ $this->convertPostTypeToPostTypeName($key), count($value)]);
                }

                $categoryVisits = $this->_group_by($visits, "category_id");
                $categoryVisitData = array();
                $categories = Category::select("id", "type", "title","status")
                    ->where('status', '=', 1)
                    ->get();
                foreach ($categoryVisits as $key => $value) {
                    $keyTitle="بدون گروه";
                    foreach($categories as $category){
                        if($category["id"]==$key){
                            $keyTitle =    $this->convertPostTypeToPostTypeName($category["type"]) . ' - ' .  $category["title"];
                            break;
                        }
                    }
                    array_push($categoryVisitData, [$keyTitle, count($value)]);
                }



                $monthlyGroups = [
                    ['مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']
                ];


                return response()->json(["status" => "true",
                    "browserData" => $browserData,
                    "deviceData" => $deviceData,
                    "monthlyVisits" => $monthlyVisitData,
                    "monthlyVisitCategories"=>$monthlyVisitCategories,
                    "monthlyGroups" => $monthlyGroups,
                    "postTypesVisit" => $postTypesVisitData,
                    "categoryVisitData" => $categoryVisitData
                ], 200);
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/statistics");
        }
    }

    private function convertYearMonthToMonthName($year_month){

        $year_month_name = "";
        $year_part = substr($year_month,0,4);
        $month_part = substr($year_month,4,2);
        $month_name = "";

        if($month_part=="01"){$month_name="فروردین";}
        if($month_part=="02"){$month_name="اردیبهشت";}
        if($month_part=="03"){$month_name="خرداد";}
        if($month_part=="04"){$month_name="تیر";}
        if($month_part=="05"){$month_name="مرداد";}
        if($month_part=="06"){$month_name="شهریور";}
        if($month_part=="07"){$month_name="مهر";}
        if($month_part=="08"){$month_name="آبان";}
        if($month_part=="09"){$month_name="آذر";}
        if($month_part=="10"){$month_name="دی";}
        if($month_part=="11"){$month_name="بهمن";}
        if($month_part=="12"){$month_name="اسفند";}

        $year_month_name = $year_part . ' - ' .  $month_name;

        return $year_month_name;
    }


    private function convertPostTypeToPostTypeName($post_type){

        $post_type_name = "";

        if($post_type=="post"){$post_type_name="پستها";}
        if($post_type=="product"){$post_type_name="محصولات";}
        if($post_type=="portfolio"){$post_type_name="نمونه کار";}
        if($post_type=="service"){$post_type_name="خدمات";}
        if($post_type=="customer"){$post_type_name="مشتریان";}
        if($post_type=="training"){$post_type_name="آموزش";}
        if($post_type=="download"){$post_type_name="دانلودها";}

        return $post_type_name;
    }

    private function convertPersianToEng($string)
    {
        $str=explode("/",$string);
        $result_string="";
        $farsi_array = "۱۲۳۴۵۶۷۸۹۰";
        $english_array = array(1=>"1", 3=>"2",5=> "3",7=> "4",9=> "5", 11=>"6",13=> "7",15=> "8", 17=>"9",19=>"0");
        $arr_farsi = str_split($farsi_array);
        for ($i=0;$i<sizeof($str);$i++){
            $arr_tmp = str_split($str[$i]);
            for ($j=1;$j<sizeof($arr_tmp);$j+=2){
                $index=array_search($arr_tmp[$j], $arr_farsi);
                if(isset($english_array[$index]))
                    $result_string.=$english_array[$index];
            }
            if ($i!=sizeof($str)-1)
                $result_string.="/";
        }
        return $result_string;
    }

    private function _group_by($array, $key)
    {
        $return = array();
        foreach ($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }
}
