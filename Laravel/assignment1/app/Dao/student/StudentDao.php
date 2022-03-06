<?php

namespace App\Dao\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\Student\StudentDaoInterface;


/**
 * Data accessing object for student
 */
class StudentDao implements StudentDaoInterface
{
  /**
   * To save student
   * @param Request $request request with inputs
   * @return Object $student saved student
   */
  public function saveStudent(Request $request)
  {
    $student = new Student();
    $student->name = $request['name'];
    $student->major_id = $request['major_id'];
    $student->save();
    return $student;
  }


  /**
   * To get student list
   * @return array $studentList student list
   */
  public function getStudentList()
  {
    $students = Student::orderBy('id', 'desc')->with('major')->get();
    return $students;
  }


  /**
   * To delete student by id
   * @param string $id student id
   */
  public function deleteStudentById($id)
  {

    $student = Student::findOrFail($id);
    $student->delete();
    return 'Deleted Successfully!';
  }


  /**
   * To get student by id
   * @param string $id student id
   * @return Object $student student object
   */
  public function getStudentById($id)
  {
    $student = Student::find($id);
    return $student;
  }

  
  /**
   * To update student by id
   * @param Request $request request with inputs
   * @param string $id Student id
   * @return Object $student Student Object
   */
  public function updatedStudentById(Request $request, $id)
  {
    $student = Student::find($id);
    $student->update([
      'name' => $request->name,
      'major_id' => $request->major_id,
      'updated_at' => now(),
    ]);
    $student->save();
    return $student;
  }
}
