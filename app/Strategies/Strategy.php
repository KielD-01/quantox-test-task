<?php


namespace Application\Strategies;


use Application\Models\Student;

abstract class Strategy
{

    /** @var Student */
    protected $student;

    protected $format = 'json';

    /**
     * @param Student $student
     */
    public function setStudent(Student $student)
    {
        $this->student = $student;
    }
}