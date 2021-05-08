<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RiskController extends Controller
{
    public function index($id = null)
    {
        if ($id != 1) {
            return view('risk.loading1');
        }

        $datas = DB::table('data')
            ->leftJoin('trace', 'data.id', '=', 'trace.data_id')
            ->select('trace.c_trace', 'trace.trace', 'trace.data_id', 'data.id', 'data.data_create', 'data.gender', 'data.age', 'data.risk_name', 'data.risk_tel', 'trace.data_id',
                'data.name_amphure', 'data.name_district', 'data.name_province', 'data.risk_surname', 'data.address', 'data.q1', (DB::raw('(SELECT (data.q2+data.q3+data.q4+data.q5+data.q6)) as sumST5'))
                , (DB::raw('(SELECT (data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9)) as sum9Q'))
                , (DB::raw('(SELECT (data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8)) as sum8Q'))
            )
            ->where('data.name_province', '=', 'สงขลา')
            ->where('data.name_amphure', '=', 'หาดใหญ่')
            ->where('data.risk_name', '!=', '')
            ->where('data.risk_tel', '!=', '')
        //->where('trace.trace', '=', '1')

            ->Where(function ($query) {
                $query->orwhere(DB::raw('data.q2+data.q3+data.q4+data.q5+data.q6'), '>=', 8)
                    ->orwhere(DB::raw('data.q1'), '>=', 3)
                    ->orwhere(DB::raw('data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9'), '>=', 7)
                    ->orwhere(DB::raw('data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8'), '>=', 1);
            })
            // ->where(DB::raw('data.q1+data.q3+data.q4+data.q5+data.q6'), '>=', 8)
            // ->where(DB::raw('data._9q1+data._9q2+data._9q3+data._9q4+data._9q5+data._9q6+data._9q7+data._9q8+data._9q9'), '>=', 7)
            // ->where(DB::raw('data._8q1+data._8q2+data._8q3+data._8q4+data._8q5+data._8q6+data._8q7+data._8q8'), '>=', 1)
            ->orderBy('data.data_create', 'desc')
            ->paginate(15);

        return view('risk.index', [
            'datas' => $datas,
        ]);

    }

    public function get_risk($id = null, $name = null, $surname = null, $district = null, $amphure = null, $province = null, $tel = null)
    {

        $datas = DB::table('trace')
            ->select('trace.date_create', 'trace.pfa', 'trace.contact', 'trace.doctor', 'trace.other', 'trace.plan'
                , 'trace.ok', 'trace.trace', 'trace.c_trace')
            ->where('trace.data_id', '=', $id)
            ->orderBy('trace.date_create', 'desc')
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
        ]);
    }

}
