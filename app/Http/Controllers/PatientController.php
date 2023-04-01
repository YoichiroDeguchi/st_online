<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Patient;
use Auth;
use App\Models\User;

class PatientController extends Controller
{
    /**
     * 利用者一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::getAllOrderByUpdated_at();
        return response()->view('patient.indexpatient',compact('patients'));
    }

    /** 
     * 利用者新規作成画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('patient.createpatient');
    }

    /**
     * 利用者新規作成処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required',
            'disease_name' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('patient.create')
            ->withInput()
            ->withErrors($validator);
        }

        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $result = Patient::create($data);
        return redirect()->route('patient.index');
    }

    /**
     * 利用者の詳細画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = Patient::find($id);
        return response()->view('patient.showpatient', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //利用者データの編集
        $patient = Patient::find($id);
        return response()->view('patient.editpatient', compact('patient'));
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
            'name' => 'required',
            'birthdate' => 'required',
            'disease_name' => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('patient.edit', $id)
            ->withInput()
            ->withErrors($validator);
        }
        //データ更新処理
        $patient = Patient::find($id)->update($request->all());
        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //利用者データを削除
        $patient = Patient::find($id)->delete();
        return redirect()->route('patient.index');
    }

    public function mydata()
    {
        // Userモデルに定義したリレーションを使用してデータを取得する．
        $patients = User::query()
        ->find(Auth::user()->id)
        ->userPatients()
        ->orderBy('created_at','desc')
        ->get();
        return response()->view('patient.indexpatient', compact('patients'));
    }

}
