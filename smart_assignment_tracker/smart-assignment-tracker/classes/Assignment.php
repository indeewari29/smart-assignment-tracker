<?php
class Assignment
{
    private $id;
    private $title;
    private $subject;
    private $deadline;
    private $priority;
    private $userId;

    public function __construct($id, $title, $subject, $deadline, $priority, $userId = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->subject = $subject;
        $this->deadline = $deadline;
        $this->priority = $priority;
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
