<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function index($id = null)
    {
        if ($id != 1) {
            return view('risk.loading1');
        }

        $datas = DB::table('data AS t1')
        ->leftJoin(\DB::raw('(SELECT id,data_id,c_trace,trace  FROM trace A WHERE id = (SELECT MAX(id) FROM trace B WHERE A.data_id=B.data_id)) AS t2'), function($join) {
            $join->on('t1.id', '=', 't2.data_id');
        })
        ->select('t2.c_trace', 't2.trace', 't2.data_id', 't1.id', 't1.data_create', 't1.gender', 't1.age', 't1.risk_name', 't1.risk_tel', 't2.data_id',
         't1.name_amphure', 't1.name_district', 't1.name_province', 't1.risk_surname', 't1.address', 't1.q1', (DB::raw('(SELECT (t1.q2+t1.q3+t1.q4+t1.q5+t1.q6)) as sumST5'))
        , (DB::raw('(SELECT (t1._9q1+t1._9q2+t1._9q3+t1._9q4+t1._9q5+t1._9q6+t1._9q7+t1._9q8+t1._9q9)) as sum9Q'))
        , (DB::raw('(SELECT (t1._8q1+t1._8q2+t1._8q3+t1._8q4+t1._8q5+t1._8q6+t1._8q7+t1._8q8)) as sum8Q'))
         )
        ->where('t1.name_province', '=', 'สงขลา')
        ->where('t1.name_amphure', '=', 'หาดใหญ่')
        ->where('t1.risk_name', '!=', '')
        ->where('t1.risk_tel', '!=', '')
         ->Where(function ($query) {
        $query->orwhere(DB::raw('t1.q2+t1.q3+t1.q4+t1.q5+t1.q6'), '>=', 8)
        ->orwhere(DB::raw('t1.q1'), '>=', 3)
        ->orwhere(DB::raw('t1._9q1+t1._9q2+t1._9q3+t1._9q4+t1._9q5+t1._9q6+t1._9q7+t1._9q8+t1._9q9'), '>=', 7)
        ->orwhere(DB::raw('t1._8q1+t1._8q2+t1._8q3+t1._8q4+t1._8q5+t1._8q6+t1._8q7+t1._8q8'), '>=', 1);
            })
        ->orderBy('t1.data_create', 'desc')
       // ->where('t1.id', '=', '1663970')
        ->paginate(15);


        //     $t1s = DB::table('data')
        //     ->leftJoin('trace', 'data.id', '=', 'trace.data_id')
        //     ->select('trace.c_trace', 'trace.trace', 'trace.data_id', 'data.id', 'data.data_create', 'data.gender', 'data.age', 'data.risk_name', 'data.risk_tel', 'trace.data_id',
        //         'data.name_amphure', 'data.name_district', 'data.name_province', 'data.risk_surname', 'data.address', 'data.q1', (DB::raw('(SELECT (data.q2+data.q3+data.q4+data.q5+data.q6)) as sumST5'))
        //         , (DB::raw('(SELECT (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9)) as sum9Q'))
        //         , (DB::raw('(SELECT (data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8)) as sum8Q'))
        //     )
        //     ->where('data.name_province', '=', 'ตรัง')
        //     ->where('data.name_amphure', '=', 'ปะเหลียน')
        //     ->where('data.risk_name', '!=', '')
        //     ->where('data.risk_tel', '!=', '')
        // //->where('trace.trace', '=', '1')

        //     ->Where(function ($query) {
        //         $query->orwhere(DB::raw('data.q2+data.q3+data.q4+data.q5+data.q6'), '>=', 8)
        //             ->orwhere(DB::raw('data.q1'), '>=', 3)
        //             ->orwhere(DB::raw('data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9'), '>=', 7)
        //             ->orwhere(DB::raw('data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8'), '>=', 1);
        //     })
        //     // ->where(DB::raw('data.q1+data.q3+data.q4+data.q5+data.q6'), '>=', 8)
        //     // ->where(DB::raw('data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9'), '>=', 7)
        //     // ->where(DB::raw('data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8'), '>=', 1)
        //     ->orderBy('data.data_create', 'desc')
        //     ->paginate(15);

        return view('risk.index', [
            'datas' => $datas,
        ]);

       // dd($datas);

    }

    public function get_risk($id = null, $name = null, $surname = null, $district = null, $amphure = null, $province = null, $tel = null, $address = null, $date_in = null)
    {

        $datas = DB::table('trace')
            ->select('trace.date_create', 'trace.pfa', 'trace.contact', 'trace.doctor', 'trace.other', 'trace.plan'
                , 'trace.ok', 'trace.trace', 'trace.c_trace')
            ->where('trace.data_id', '=', $id)
            ->orderBy('trace.date_create', 'ASC')
            ->paginate(15);

        return view('risk.get', [
            'id' => $id,
            'name' => $name,
            'surname' => $surname,
            'district' => $district,
            'amphure' => $amphure,
            'province' => $province,
            'tel' => $tel,
            'datas' => $datas,
            'address' => $address,
            'date_in' => $date_in,
        ]);
    }
    
    public function create(Request $request)
    {
        //return view('risk.action_form');
        return view('risk.action_form', [
            'id' => $request->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'district' => $request->district,
            'amphure' => $request->amphure,
            'province' => $request->province,
            'tel' => $request->tel,
            'address' => $request->address,
            'date_in' => $request->date_in,
        ]);
        //dd($request->id);
       //dd($request);

    }

    public function store(Request $request)
    {
        //return view('risk.action_form');
        //dd($request->id);
       dd($request);

    }




}
