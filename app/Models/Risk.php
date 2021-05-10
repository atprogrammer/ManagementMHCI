<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Risk extends Model
{
    use HasFactory;

    protected $table = "data";

    public static function getRisk(){
        $records =  DB::table('data AS t1')
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
        ->get()->toArray();

        return $records;
    }
}


