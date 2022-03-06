<?php

namespace App\Services\Task;

use Illuminate\Http\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Dao\Task;



/**
 * Service class for post.
 */
class TaskService implements TaskServiceInterface
{
  /**
   * post dao
   */
  private $taskDao;
  /**
   * Class Constructor
   * @param TaskDaoInterface
   * @return
   */
  public function __construct(TaskDaoInterface $taskDao)
  {
    $this->taskDao = $taskDao;
  }

  /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function createTask(Request $request)
  {
    return $this->taskDao->createTask($request);
  }

  /**
   * To get post list
   * @return array $postList Post list
   */
  public function getTaskList()
  {
    return $this->taskDao->getTaskList();
  }

  /**
   * To delete post by id
   * @param string $id post id
   * @return string $message message success or not
   */
  public function deleteTaskById($id)
  {
    return $this->taskDao->deleteTaskById($id);
  }

  // /**
  //  * To get post by id
  //  * @param string $id post id
  //  * @return Object $post post object
  //  */
  // public function getTaskById($id)
  // {
  //   return $this->taskDao->getTaskById($id);
  // }

  
}
