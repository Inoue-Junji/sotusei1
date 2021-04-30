<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 下記2行を追加
use Validator;
use App\Models\Runner;
// ↓追加
// use Auth;

class RunnerController extends Controller
{
    // ↓関数を作成
    //   public function __construct()
    //   {
    //     $this->middleware(['auth']);
    //   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // モデルに定義した関数を実行する．
        $runners = Runner::getAllOrderByGrade();
        // ddd($runners);
        return view('runner.index', ['runners' => $runners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 追記
        return view('runner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
  $validator = Validator::make($request->all(), [
    'runner' => 'required | max:191',
    //  'grade' => 'required',
  ]);
  // バリデーション:エラー
  if ($validator->fails()) {
    return redirect()
      ->route('runner.create')
      ->withInput()
      ->withErrors($validator);
  }
  // フォームから送信されてきたデータとユーザIDをマージする
//   $data = $request->merge(['runner_id' => Auth::user()->id])->all();
  // create()は最初から用意されている関数
  // 戻り値は挿入されたレコードの情報
  $result = Runner::create($request->all());
  // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
  return redirect()->route('runner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function measure($id)
    {
        $runner = Runner::find($id);
        //ddd($runner);
        return view('runner.', ['runner' => $runner]);
    }
     
     
    public function show($id)
    {
        $runner = Runner::find($id);
        // ddd($runner);
        return view('runner.measure', ['runner' => $runner]);
    }
    
    
    
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $runner = Runner::find($id);
        return view('runner.edit', ['runner' => $runner]);
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
        //バリデーション
      $validator = Validator::make($request->all(), [
        'runner' => 'required | max:191',
        // 'grade' => 'required',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('runner.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      //データ更新処理
      // updateは更新する情報がなくても更新が走る（updated_atが更新される）
      $result = Runner::find($id)->update($request->all());
      // fill()save()は更新する情報がない場合は更新が走らない（updated_atが更新されない）
      // $redult = Todo::find($id)->fill($request->all())->save();
      return redirect()->route('runner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Runner::find($id)->delete();
        return redirect()->route('runner.index');
    }
    
    // public function measure(Request $request)
    // {
    
    //  public function measure($id)
    // {
    //     $runner = Runner::find($id);
    //     ddd($runner);
    //     return view('runner.measure', ['runner' => $runner]);
    // }
//      public function measure()
//     {
//         // 追記
//         ddd(runner);
//         // ddd($runner);
//     {
//         return view('runner.measure');
        
//         // $runner = Runner::find($id);
//         // ddd($runner);
//         // return view('runner.measure', ['runner' => $runner]);
//     }
    
//   }
    
}
