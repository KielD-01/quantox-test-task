<?php

namespace Application\Strategies\Boards;

use Application\Fractals\StudentFractal;
use Application\Strategies\Strategy;
use Framework\Core\Output\Xml;

/**
 * Class CSMB
 * @package Application\Strategies\Boards
 */
class CSMB extends Strategy
{

    const GRADE_TO_PASS_CSMB = 8;

    public function calculate(): string
    {
        header('Content-Type: text/xml', true);

        $student = StudentFractal::transform($this->student);
        $student['result'] = $this->student->grades->max('grade') >= static::GRADE_TO_PASS_CSMB ? 'Pass' : 'Fail';

        return Xml::output($student);
    }
}