<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Student;
use Illuminate\Http\Request;
use DB;
use auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Student::all();

        //return auth()->user()->name;
        return response('Student Store Done');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['class_id']=$request->class_id;
        $data['section_id']=$request->section_id;
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['enail']=$request->enail;
        $data['password'] = Hash::make($request->password);
        $data['photo']=$request->photo;
        $data['address']=$request->address;
        $data['gender']=$request->gender;
        DB::table('students')->insert($data);
        return response('Student Store Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $show=DB::table('students')->where('id',$id)->first();
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data=array();
        $data['class_id']=$request->class_id;
        $data['section_id']=$request->section_id;
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['enail']=$request->enail;
        $data['password'] = Hash::make($request->password);
        $data['photo']=$request->photo;
        $data['address']=$request->address;
        $data['gender']=$request->gender;

        DB::table('students')->where('id',$id)->update($data);
        return response('students Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $img = DB::table('students')->where('id',$id)->first();
        $location = public_path('/'.$img->photo);
        unlink($location);

        DB::table('students')->where('id',$id)->delete();
        return response('students Delete');
    }
}
