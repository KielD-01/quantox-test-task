<?php


namespace Application\Fractals;


use Application\Models\Student;
use Framework\Core\Interfaces\FractalInterface;

class StudentFractal implements FractalInterface
{

    /**
     * @param Student $student
     * @return array
     */
    public static function transform($student): array
    {
        return [
            'id' => $student->id,
            'name' => $student->name,
            'grades' => $student->grades()->pluck('grade'),
            'avg' => $student->average_grade,
            'result' => null
        ];
    }
}