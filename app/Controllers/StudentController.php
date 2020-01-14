<?php


namespace Application\Controllers;


use Application\Models\Student;
use Framework\Core\Controller;

class StudentController extends Controller
{
    public function show(int $student)
    {
        /** @var Student $student */
        $student = Student::query()->where('id', $student)->first();

        

        echo $student->getPassOrFailBoardResult();
    }
}