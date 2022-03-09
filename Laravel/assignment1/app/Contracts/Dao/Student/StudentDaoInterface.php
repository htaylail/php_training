<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Student
 */
interface StudentDaoInterface
{
  /**
   * To save student
   * @param Request $request request with inputs
   * @return Object $student saved student
   */
  public function saveStudent(Request $request);

  /**
   * To get student list
   * @return $studentList
   */
  public function getStudentList();

  /**
   * To get student by id
   * @param string $id student id
   * @return Object $student student object
   */
  public function getStudentById($id);


  /**
   * To delete student by id
   * @param string $id student id
   * @return string $message message success or not
   */
  public function deleteStudentById($id);  

  /**
   * To update student by id
   * @param Request $request request with inputs
   * @param string $id Student id
   * @return Object $student Student Object
   */
  public function updatedStudentById(Request $request, $id);


  /**
   * To search student data 
   * @param Request $request request with inputs
   * @return Object $student student Object
   */
  public function searchStudent(Request $request);


   /**
   * To search student data 
   * @param Request $request request with inputs
   * @return Object $student student Object
   */
  public function importExportView();

  /**
   * To search student data 
   * @param Request $request request with inputs
   * @return Object $student student Object
   */
  public function exportStudent();

    /**
   * To search student data 
   * @param Request $request request with inputs
   * @return Object $student student Object
   */
  public function importStudent();
}
