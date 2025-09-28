<?php

class Task
{
    public $id;
    public $label;
    public $date_created;

    public function __construct(string $label)
    {
        $this->id = uniqid();
        $this->label = $label;
        $this->date_created = new \DateTime();
    }

    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    public function setDateCreated(string $date)
    {
        $this->date_created = $date;
        return $this;
    }

    public function getCSVString() : string {
        return $this->id . ',' . $this->label . ',' . $this->date_created->format('Y-m-d H:i:s') . PHP_EOL;
    }
}
