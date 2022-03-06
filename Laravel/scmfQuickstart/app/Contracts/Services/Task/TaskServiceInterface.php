<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface TaskServiceInterface
{
  /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function createTask(Request $request);

  /**
   * To get post list
   * @return array $postList Post list
   */
  public function getTaskList();

  /**
   * To delete post by id
   * @param string $id post id
   * @return string $message message success or not
   */
  public function deleteTaskById($id);

  /**
   * To get post by id
   * @param string $id post id
   * @return Object $post post object
   */
  // public function getTaskById($id);

}