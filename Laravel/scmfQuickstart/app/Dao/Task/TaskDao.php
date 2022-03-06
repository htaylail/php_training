<?php

namespace App\Dao\Task;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Task\TaskDaoInterface;

/**
 * Data accessing object for post
 */
class TaskDao implements TaskDaoInterface
{
  

/**
   * To get all task list
   * @return array $tasktList Task list
   */

  public function getTaskList()
  {
    $tasks = DB::table('tasks')
                ->orderBy('id', 'desc')
                ->get();
    return $tasks; 
  }

  /**
 * To save task
 * @param Request $request request with inputs
 * @return Object $task saved post
 */

  public function createTask(Request $request)
  {
      $task = new Task();
      $task->name = $request['name'];
      $task->save();
      return $task;
  }

    /**
   * To delete task by id
   * @param string $id task id
   * @return string $message message success or not
   */
  public function deleteTaskById($id)

  {
      $task =Task::findOrFail($id);
      $task->delete();
      return 'Deleted Successfully!';
  }

    /**
   * To get post by id
   * @param string $id post id
   * @return Object $post post object
   */
  public function getTaskById($id)
  {
    $task = Task::find($id);
    return $task;
  }


}



