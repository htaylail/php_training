<?php

namespace App\Http\Controllers\Student;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;

use App\Imports\StudentsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Services\Student\StudentServiceInterface;
use PHPUnit\Framework\MockObject\Builder\Stub;
use Illuminate\Support\Facades\DB;

/**
 * This is Student controller.
 * This handles Student CRUD processing.
 */
class StudentController extends Controller
{
  /**
   * student interface
   */
  private $studentInterface;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(StudentServiceInterface $studentServiceInterface)
  {
    $this->studentInterface = $studentServiceInterface;

  }


  /**
   * To show student list
   *
   * @return View Student list
   */
  public function showStudentList()
  {
    $students = $this->studentInterface->getStudentList();
    return view('index', compact('students'))
      ->with('no');
  }


  /**
   * To store student data
   * @param Request $request
   * @return View student list
   */
  public function storeStudent(Request $request)
  {
    $this->studentInterface->saveStudent($request);
    return redirect('/');
  }


  /**
   * To show create student view
   * 
   * @return View create student
   */
  public function showStudentCreate()
  {
    $majors = Major::all();
    return view('students.create', compact('majors'));
  }


  /**
   * Show student edit
   * 
   * @return View student edit
   */
  public function showStudentEdit($id)
  {
    $majors = Major::all();
    $student = $this->studentInterface->getStudentById($id);
    return view('students.edit', compact('student', 'majors'));
  }


  /**
   * To delete student by id
   * @return View student list
   */
  public function deleteStudentById($id)
  {
    $this->studentInterface->deleteStudentById($id);
    return redirect('/');
  }


  /**
   * To update student data
   * @param Request $request Request from student edit 
   * @param string $studentId Student id
   * @return View student list
   */
  public function updateStudent(Request $request, $id)
  {
    $this->studentInterface->updatedStudentById($request, $id);
    return redirect()->route('student.index');
  }

  /**
   * @return View import view
   */
  public function importExportView()
  {
    return view('students.import');
  }
  

  public function exportStudent() 
  {
    $this->studentInterface->exportStudent();  
    return redirect()->route('student.index')->with('success','Export data successfully');
  }
  
  
  public function importStudent() 
  {
    $this->studentInterface->importStudent();        
    return redirect()->route('student.index')->with('success','Import data successfully');
  }

  public function searchStudent(Request $request)
  {        
    $students = $this->studentInterface->searchStudent($request);        
    return view('index', compact('students'))->with('no');
  }

}



  // /**
  //    * @return View import view
  //    */
  //   public function importExportView()
  //   {
  //     return view('students.import');
  //   }   

  //   /**
  //    * @return \Illuminate\Support\Collection
  //    */
  //   public function exportStudent() 
  //   {
  //       return Excel::download(new StudentsExport, 'students.csv');
  //   }
   
  //   /**
  //    * @return \Illuminate\Support\Collection
  //    */
  //   public function importStudent() 
  //   {
  //       Excel::import(new StudentsImport,request()->file('file'));       
  //       return redirect()->route('student.index')->with('success','Import data successfully');
  //   }
