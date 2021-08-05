<?php

namespace App\Models;

/**
 * Class ProcessDetailActivityCompetences
 *
 * @package App\Models\Base
 */
class ProcessDetailActivity extends Base\ProcessDetailActivity
{
    public function competences()
    {
        return $this->hasMany(ProcessDetailActivityCompetences::class, 'process_d_a_id');
    }
}
