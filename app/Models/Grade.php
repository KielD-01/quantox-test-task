<?php

namespace Application\Models;


use Framework\Core\Database\Model;

/**
 * Class Grade
 * @package Application\Models
 * @property int id
 * @property integer student_id
 */
class Grade extends Model
{
    protected $table = 'grades';

    protected $casts = [
        'student_id' => 'int',
        'grade' => 'int',
    ];

    protected $fillable = [
        'student_id',
        'grade',
        'created_at'
    ];
}