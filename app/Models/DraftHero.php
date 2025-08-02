<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftHero extends Model
{
    use HasFactory;

    protected $connection = 'dnd_front';

    protected $table = 'draft_heroes';

    protected $guarded = [];
}
