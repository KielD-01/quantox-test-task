<?php

namespace Application\Models;


use Application\Strategies\Boards\CSM;
use Application\Strategies\Boards\CSMB;
use Framework\Core\Database\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class Student
 * @package Application\Models
 * @property int id
 * @property string board
 * @property string name
 * @property string ssn
 * @property Grade[] grades
 * @property float average_grade
 */
class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'board',
        'name',
        'ssn'
    ];

    protected $casts = [
        'average_grade' => 'float',
        'id' => 'int'
    ];

    /**
     * @return HasMany|Grade[]|Collection
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * @return float
     */
    public function getAverageGradeAttribute()
    {
        return (float)$this->grades()->avg('grade');
    }

    public function getPassOrFailBoardResult()
    {
        $boards = [
            'CSM' => CSM::class,
            'CSMB' => CSMB::class
        ];

        $board = $boards[$this->board];

        /** @var CSM|CSMB $board */
        $board = new $board;
        $board->setStudent($this);

        return $board->calculate();
    }
}