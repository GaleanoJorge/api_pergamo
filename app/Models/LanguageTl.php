<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LanguageTl as BaseLanguageTl;

class LanguageTl extends BaseLanguageTl
{
  protected $fillable = [
    'phonetic_phonological',
    'syntactic',
    'morphosyntactic',
    'semantic',
    'pragmatic',
    'reception',
    'coding',
    'decoding',
    'production',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
