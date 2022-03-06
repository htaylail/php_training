<?php

namespace App\Http\Controllers\Task;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\Task\TaskServiceInterface;


/**
 * This is Task controller.
 * This handles Task CRUD processing.
 */
class TaskController extends Controller
{
  /**
   * Task interface
   */
  private $taskInterface;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(TaskServiceInterface $taskServiceInterface)
  {
    $this->taskInterface = $taskServiceInterface;
  }


    /**
   * To show create post view
   * 
   * @return View create post
   */
  public function showTaskCreate(Request $request)
  {
      // $this->taskInterface->createTask($request);
      $task = $this->taskInterface->createTask($request);
      return redirect()->route('task.list');
  }

  /**
   * To show post list
   *
   * @return View Post list
   */
  public function showTaskList()
  {
    $taskList = $this->taskInterface->getTaskList();
    return view('tasks.tasks', compact('taskList'));
  }

  /**
   * To delete post by id
   * @return View post list
   */
  public function deleteTaskById($taskId)
  {
    $this->taskInterface->deleteTaskById($taskId);
    //return response($msg, 204);
    // Task::findOrFail($id)->delete();
     return redirect('/');

  }


}
