<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nama', 'tanggal_mulai', 'tanggal_target'
    ];
}
