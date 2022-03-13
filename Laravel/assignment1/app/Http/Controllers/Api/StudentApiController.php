<?php

namespace App\Http\Controllers\Api;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCreateApiRequest;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Requests\StudentEditApiRequest;
use App\Http\Resources\StudentResource;
use SebastianBergmann\Environment\Console;

class StudentApiController extends Controller
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
        // $data['students'] = Student::orderBy('id','desc');
        $data['students'] = Student::orderBy('id','desc')->paginate(5);
        return view('ajaxs.list',$data);
    }
    

  /**
   * To show student list via api
   *
   * @return View Student list
   */
  public function showStudentList()
  {
    $students = $this->studentInterface->getStudentList();
    return response()->json($students);
  }

  
  /**
   * To store student by id via API
   * @param string $studentId student id
   * @return Response json student object
   */
  public function storeStudent(Request $request)
  {
    $student = $this->studentInterface->saveStudent($request);
    return response()->json(['Student add succefully', new StudentResource($student)]);
  }


  /**
   * To get student by id via API
   * @param string $studentId student id
   * @return Response json student object
   */
  public function getStudentById($studentId)
  {
      $student = $this->studentInterface->getStudentById($studentId);
      if (is_null($student)) {
          return response()->json('Student not found', 404); 
      }
      return response()->json([new StudentResource($student)]);
  }

  /**
   * To delete student by id via api
   * @return View student list
   */
  public function deleteStudentById($id)
  {
    $student = $this->studentInterface->deleteStudentById($id);
    return response()->json($student,['success' => true]);
  }


  /**
   * To update student data via api
   * @param Request $request Request from student edit 
   * @param string $studentId Student id
   * @return View student list
   */
  public function updateStudent(StudentEditApiRequest $request, $id)
  {
    $request->validated();
     $student = $this->studentInterface->updatedStudentById($request, $id);
     return response()->json($student);
  }   

}