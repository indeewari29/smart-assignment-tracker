<?php
class Subtask
{
    private $id;
    private $name;
    private $timeLimit;
    private $assignmentId;
    private $isCompleted;

    public function __construct($id, $name, $timeLimit, $assignmentId, $isCompleted = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->timeLimit = $timeLimit;
        $this->assignmentId = $assignmentId;
        $this->isCompleted = $isCompleted;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getTimeLimit()
    {
        return $this->timeLimit;
    }
    public function getAssignmentId()
    {
        return $this->assignmentId;
    }
    public function isCompleted()
    {
        return $this->isCompleted;
    }
}
