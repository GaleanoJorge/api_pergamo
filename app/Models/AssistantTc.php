<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AssistantTc as BaseAssistantTc;

class AssistantTc extends BaseAssistantTc
{
  protected $fillable = [
    'agent_number',
    'agent_name',
    'hold',
    'lunch',
    'break_am',
    'break_pm',
    'outgoing_call',
    'bathroom',
    'whatsapp',
    'user_attention',
    'meeting',
    'total'
  ];
}
