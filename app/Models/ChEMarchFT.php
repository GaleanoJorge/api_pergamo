<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMarchFT as BaseChEMarchFT;

class ChEMarchFT extends BaseChEMarchFT
{
  protected $fillable = [
    'independent',
    'help',
    'spastic',
    'ataxic',
    'contact',
    'response',
    'support_init',
    'support_finish',
    'prebalance',
    'medium_balance',
    'finish_balance',
    'observation',

  ];
}
