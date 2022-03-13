<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentAjaxController extends Controller
{
    private $studentInterface;

    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
      $this->studentInterface = $studentServiceInterface;
    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::orderBy('id','desc')->paginate(5);   
        return view('ajaxs.list',$data)->with('no');
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student   =   Student::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name' => $request->name, 
                        'grade' => $request->grade,
                        'major_id' => $request->major_id,
                    ]);    
       return response()->json(['success' => true]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $student  = Student::where($where)->first();
 
        return response()->json($student);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = Student::where('id',$request->id)->delete();   
        return response()->json(['success' => true]);
    }
}
