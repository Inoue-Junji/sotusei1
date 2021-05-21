<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 下記2行を追加
use Validator;
use App\Models\Runner;
use App\Models\Lap;
// ↓追加
use Auth;
use App\Providers\RouteServiceProvider;


class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('runner.measure');
    }

    /**
     * Show the form for creating a new resource.
     *;
     * @return \Illuminate\Http\Response
     */
    public function time(Request $request)
    {
        $requestData=$request->all();
        forEach($requestData as $data){
            Lap::create($data);
           // return $data;
        }
        
        //return $hoge;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     echo 'hoge';
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    $runners = Runner::getMyAllOrderByGrade();
    return $runners;    
        
    }
    public function showRecord(){
        $record = Lap::select()->leftJoin('runners','runners.id','=','laps.runner_id')->get();
        // ddd($record);
        return view('runner.arrange',['records'=>$record]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // public function measure($id)
    // { 
    //     // ddd($id);
    //     $runner = Measure::find($id);
    //     // ddd($runner);
    //     // return view('runner.show', ['runner' => $runner]);
    //     // 追加
    //     return view('runner.measure');
    // }
}
