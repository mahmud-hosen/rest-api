<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subject::all();
    }



    public function store(Request $request)
    {
        Subject::create($request->all());
        return response('Subject Store Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $show=DB::table('subjects')->where('id',$id)->first();
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=array();
        $data['subject_name']=$request->subject_name;
        $data['subject_code']=$request->subject_code;


        DB::table('subjects')->where('id',$id)->update($data);
        return response('Subject Update');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subjects')->where('id',$id)->delete();
        return response('Subject Delete');

    }
}
