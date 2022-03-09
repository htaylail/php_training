<?php
namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;


/**
 * Service class for student.
 */
class StudentService implements StudentServiceInterface
{
  /**
   * student dao
   */
  private $studentDao;
  /**
   * Class Constructor
   * @param StudentDaoInterface
   * @return
   */
  public function __construct(StudentDaoInterface $studentDao)
  {
    $this->studentDao = $studentDao;
  }


  /**
   * To save student
   * @param Request $request request with inputs
   * @return Object $student saved student
   */
  public function saveStudent(Request $request)
  {
    return $this->studentDao->saveStudent($request);
  }


  /**
   * To get student list
   * @return array $studentList Sudent list
   */
  public function getStudentList()
  {
    return $this->studentDao->getStudentList();
  }


  /**
   * To delete student by id
   * @param string $id student id
   * @return string $studentList after delete
   */
  public function deleteStudentById($id)
  {
    return $this->studentDao->deleteStudentById($id);
  }


  /**
   * To get student by id
   * @param string $id student id
   * @return Object $student student object
   */
  public function getStudentById($id)
  {
    return $this->studentDao->getStudentById($id);
  }


  /**
   * To update student by id
   * @param Request $request request with inputs
   * @param string $id Student id
   * @return Object $student Student Object
   */
  public function updatedStudentById(Request $request, $id)
  {
    return $this->studentDao->updatedStudentById($request, $id);
  }


  /**
   * To search student
   * @param Request $request request with inputs
   * @return Object $student Student Object
   */
  public function searchStudent(Request $request)
  {
    return $this->studentDao->searchStudent($request);
  }

  /**
   * @return View import view
   */
  public function importExportView()
  {
    return $this->studentDao->importExportView();     
  }

  /**
   * To export student
   */
  public function exportStudent()
  {
    return $this->studentDao->exportStudent();
  }
  

  /**
  * To import student
  */
  public function importStudent()
  {
    return $this->studentDao->importStudent();
  }
}