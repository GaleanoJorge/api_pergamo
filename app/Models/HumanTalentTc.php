<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\HumanTalentTc as BaseHumanTalentTc;

class HumanTalentTc extends BaseHumanTalentTc
{
  protected $fillable = [
    'period',
    'status',
    'contract',
    'nrodoc',
    'typedoc',
    'name',
    'accrued_cost',
    'employer_cost',
    'provision_cost',
    'total_cost',
    'net',
    'percent',
    'campus',
    'ambit_gen',
    'ambit_esp',
    'ambit_esp2',
    'specialty',
    'position',
    'agreement',
    'direction',
    'account_type',
    'nroaccount',
    'bank',
    'codbank',
  ];
}
