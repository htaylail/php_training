<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Task
 */
interface TaskDaoInterface
{
  /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved task
   */
  public function createTask(Request $request);

  /**
   * To get task list
   * @return $taskList
   */
  public function getTaskList();

  /**
   * To delete task by id
   * @param string $id task id
   * @param string $deletedUserId deleted user id
   * @return string $message message success or not
   */
  public function deleteTaskById($id);

  /**
   * To get task by id
   * @param string $id task id
   * @return Object $task task object
   */
  public function getTaskById($id);
}