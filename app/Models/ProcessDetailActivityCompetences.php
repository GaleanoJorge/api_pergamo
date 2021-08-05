<?php

namespace App\Models;

/**
 * Class ProcessDetailActivityCompetences
 *
 * @package App\Models\Base
 */
class ProcessDetailActivityCompetences extends Base\ProcessDetailActivityCompetences
{
    protected $fillable = [
        'process_d_a_id',
        'rate',
        'rate_desc',
        'proficiency',
        'proficiency_desc',
        'shortname'
    ];
}
