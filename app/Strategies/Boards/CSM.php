<?php


namespace Application\Strategies\Boards;


use Application\Fractals\StudentFractal;
use Application\Strategies\Strategy;
use Framework\Core\Output\Json;

class CSM extends Strategy
{

    /** @var float  */
    const GRADE_TO_PASS_CSM = 7.0;

    /**
     * @return string
     */
    public function calculate()
    {
        header('Content-Type: application/json', true);

        $student = StudentFractal::transform($this->student);
        $student['result'] = ($student['avg'] >= self::GRADE_TO_PASS_CSM);

        return Json::output($student);
    }
}