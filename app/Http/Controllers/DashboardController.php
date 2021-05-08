<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

//ใช้ Query มือ

class DashboardController extends Controller
{
    public function index($id = null)
    {

        if($id!=1){
        return view('dashboard.loading1');
        }


        // $provinces = DB::table('data')
        //     ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
        //     ->select('data.name_province', DB::raw('count(data.id) as total'))
        //     ->groupBy('data.name_province')
        // //->where('provinces2.Reg_id', '=', '12')
        //     ->limit(10)
        //     ->orderBy('total', 'desc')
        //     ->get();

        $regs = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select('provinces2.Reg_id', DB::raw('count(data.id) as total'))
            ->groupBy('provinces2.Reg_id')
        //->where('provinces2.Reg_id', '=', '12')
            ->limit(13)
            ->orderBy('total', 'desc')
            ->get();
        //$data=1;

        $dataST5s = DB::table('data')
        //->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
    WHEN (data.q2+data.q3+data.q4+data.q5+data.q6) >= 8 THEN "เครียดมากถึงมากที่สุด"
    ELSE "เครียดน้อย"
    END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->get();

        $data9Qs = DB::table('data')
        //->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
          WHEN (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9) >= 7 THEN "ระดับน้อย"
          ELSE "ไม่มีอาการ"
          END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
        // ->where('provinces2.Reg_id', '=', '12')
            ->get();

        $data8Qs = DB::table('data')
        // ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
          WHEN (data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8) >= 1 THEN "ระดับน้อย"
          ELSE "ไม่มีอาการ"
          END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
        //->where('provinces2.Reg_id', '=', '12')
            ->get();

        $burnOuts = DB::table('data')
        //->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
            WHEN (data.q1) >= 3 THEN "มีความเสี่ยง"
            ELSE "ปกติ"
            END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
        // ->where('provinces2.Reg_id', '=', '12')
            ->get();

        return view('dashboard.index', [
            // 'provinces' => $provinces,
            'regs' => $regs,
            'dataST5s' => $dataST5s,
            'data9Qs' => $data9Qs,
            'data8Qs' => $data8Qs,
            'burnOuts' => $burnOuts,
        ]);
    }

    public function dashboard1($id = null)
    {

        if($id!=1){
            return view('dashboard.loading2');
        }
    

        $genders = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select('data.gender', DB::raw('count(data.id) as total'))
            ->groupBy('data.gender')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();
        // $sum_total = 0;
        // foreach ($genders as $gender) {
        //     $sum_total = $sum_total + $gender->total;
        //     echo $gender->gender . ' ' . $gender->total . '<br>----------<br>';
        // }

        //echo ('ทั้งหมด' . $sum_total . '<br>_____________________________<br>');

        $provinces = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select('data.name_province', DB::raw('count(data.id) as total'))
            ->groupBy('data.name_province')
            ->where('provinces2.Reg_id', '=', '12')
            ->limit(10)
            ->orderBy('total', 'desc')
            ->get();

        // // $users = DB::table('data')->groupBy('name_province')->count();

        // foreach ($users as $user) {

        //     echo $user->name_province . ' ' . $user->total . '<br>';
        // }

        // ///////////////////////////////////////////////////////////////////////////

        $dataST5 = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
        WHEN (data.q2+data.q3+data.q4+data.q5+data.q6) >= 10 THEN "เครียดมากที่สุด"
        WHEN (data.q2+data.q3+data.q4+data.q5+data.q6) >= 8 THEN "เครียดมาก"
        WHEN (data.q2+data.q3+data.q4+data.q5+data.q6) >= 5 THEN "เครียดปานกลาง"
        WHEN (data.q2+data.q3+data.q4+data.q5+data.q6) >= 0 THEN "เครียดน้อย"
        ELSE "เครียดน้อย"
        END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();

        // $sumMax_deperss = 0;
        // foreach ($sums as $sum) {
        //     if ($sum->status_lable == 'เครียดมาก' || $sum->status_lable == 'เครียดมากที่สุด') {
        //         $sumMax_deperss = $sumMax_deperss + $sum->total;
        //     }
        //     echo $sum->status_lable . ' ' . $sum->total . '<br>';
        // }

        // echo 'มีภาวะเครียด = ' . $sumMax_deperss . '<br>-----------------------------<br>';

        $data9Q = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
          WHEN (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9) >= 19 THEN "ระดับรุนแรง"
          WHEN (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9) >= 13 THEN "ระดับปานกลาง"
          WHEN (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9) >= 7 THEN "ระดับน้อย"
          WHEN (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9) < 7 THEN "ไม่มีอาการ"
          ELSE "ไม่มีอาการ"
          END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();

        // $sumMax_deperss = 0;
        // foreach ($sums as $sum) {
        //     if ($sum->status_lable == 'ระดับน้อย' || $sum->status_lable == 'ระดับปานกลาง' || $sum->status_lable == 'ระดับรุนแรง') {
        //         $sumMax_deperss = $sumMax_deperss + $sum->total;
        //     }
        //     echo $sum->status_lable . ' ' . $sum->total . '<br>';
        // }

        // echo 'มีความเสี่ยงซึมเศร้า = ' . $sumMax_deperss . '<br>-----------------------------<br>';

        $data8Q = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
          WHEN (data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8) >= 17 THEN "ระดับรุนแรง"
          WHEN (data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8) >= 9 THEN "ระดับปานกลาง"
          WHEN (data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8) >= 1 THEN "ระดับน้อย"
          WHEN (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9) < 1 THEN "ไม่มีอาการ"
          ELSE "ไม่มีอาการ"
          END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();

        // $sumMax_deperss = 0;
        // foreach ($sums as $sum) {
        //     if ($sum->status_lable == 'ระดับน้อย' || $sum->status_lable == 'ระดับปานกลาง' || $sum->status_lable == 'ระดับรุนแรง') {
        //         $sumMax_deperss = $sumMax_deperss + $sum->total;
        //     }
        //     echo $sum->status_lable . ' ' . $sum->total . '<br>';
        // }

        // echo 'มีความเสี่ยงฆ่าตัวตาย = ' . $sumMax_deperss . '<br>-----------------------------<br>';

        $data2Q = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
          WHEN (data.q7+data.q8) >= 1 THEN "มีความเสี่ยง"
          WHEN (data.q7+data.q8) <= 0 THEN "ไม่มีความเสี่ยง"
          ELSE "ไม่มีความเสี่ยง"
          END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();

        // $sumMax_deperss = 0;
        // foreach ($sums as $sum) {
        //     if ($sum->status_lable == 'มีความเสี่ยง') {
        //         $sumMax_deperss = $sumMax_deperss + $sum->total;
        //     }
        //     echo $sum->status_lable . ' ' . $sum->total . '<br>';
        // }

        // echo 'มีภาวะ 2Q = ' . $sumMax_deperss . '<br>-----------------------------<br>';

        $burnOut = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
            WHEN (data.q1) >= 3 THEN "มีความเสี่ยง"
            ELSE "ปกติ"
            END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();

        // $sumMax_deperss = 0;
        // foreach ($sums as $sum) {
        //     if ($sum->status_lable == 'มีความเสี่ยง') {
        //         $sumMax_deperss = $sumMax_deperss + $sum->total;
        //     }
        //     echo $sum->status_lable . ' ' . $sum->total . '<br>';
        // }

        // echo 'มีภาวะ BurnOut = ' . $sumMax_deperss . '<br>-----------------------------<br>';

        return view('dashboard.dashboard1', [
            'genders' => $genders,
            'provinces' => $provinces,
            'dataST5s' => $dataST5,
            'data9Qs' => $data9Q,
            'data8Qs' => $data8Q,
            'data2Qs' => $data2Q,
            'burnOuts' => $burnOut,
        ]);

        // return view('dashboard.index');

    }

    public function dashboard2()
    {
     

        $dataST5s = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
    WHEN (data.q2+data.q3+data.q4+data.q5+data.q6) >= 8 AND data.risk_group4 = 4 AND (data.people_type!="อสม" AND data.people_type!="เจ้าหน้าที่สาธารณสุข") AND data.risk_group3 != 3  THEN "เครียดมาก"
    ELSE "ปกติ"
    END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();

        $sumMax_deperss = 0;
        foreach ($dataST5s as $dataST5) {
            if ($dataST5->status_lable == 'เครียดมาก') {
                $sumMax_deperss = $sumMax_deperss + $dataST5->total;
            }
            echo $dataST5->status_lable . ' ' . $dataST5->total . '<br>';
        }

        echo 'มีภาวะเครียด = ' . $sumMax_deperss . '<br>-----------------------------<br>';

        $data9Qs = DB::table('data')
            ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
          WHEN (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9) >= 7 AND data.risk_group4 = 4  AND (data.people_type!="อสม" AND data.people_type!="เจ้าหน้าที่สาธารณสุข") AND data.risk_group3 != 3  THEN "ระดับน้อย"
          ELSE "ไม่มีอาการ"
          END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
            ->where('provinces2.Reg_id', '=', '12')
            ->get();

        $sumMax_deperss = 0;
        foreach ($data9Qs as $data9Q) {
            if ($data9Q->status_lable == 'ระดับน้อย') {
                $sumMax_deperss = $sumMax_deperss + $data9Q->total;
            }
            echo $data9Q->status_lable . ' ' . $data9Q->total . '<br>';
        }

        echo 'มีภาวะซึมเศร้า = ' . $sumMax_deperss . '<br>-----------------------------<br>';


        $data8Qs = DB::table('data')
         ->leftJoin('provinces2', 'data.name_province', '=', 'provinces2.name_th')
            ->select(DB::raw('(CASE
          WHEN (data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8) >= 1 AND data.risk_group4 = 4  AND (data.people_type!="อสม" AND data.people_type!="เจ้าหน้าที่สาธารณสุข") AND data.risk_group3 != 3  THEN "ระดับน้อย"
          ELSE "ไม่มีอาการ"
          END) AS status_lable'),
                DB::raw('count(data.id) as total'))
            ->groupBy('status_lable')
        ->where('provinces2.Reg_id', '=', '12')
            ->get();

            $sumMax_deperss = 0;
            foreach ($data8Qs as $data8Q) {
                if ($data8Q->status_lable == 'ระดับน้อย') {
                    $sumMax_deperss = $sumMax_deperss + $data8Q->total;
                }
                echo $data8Q->status_lable . ' ' . $data8Q->total . '<br>';
            }
    
            echo 'มีภาวะเสี่ยงฆ่าตัวตาย = ' . $sumMax_deperss . '<br>-----------------------------<br>';

    }

}
