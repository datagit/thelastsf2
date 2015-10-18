<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 19/10/2015
 * Time: 06:33
 */

namespace Dao\DevBundle\Entity;


class Task {

    protected $task;
    protected $dueDate;

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate(\DateTime $dueDate)
    {
        $this->dueDate = $dueDate;
    }


}