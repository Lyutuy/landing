<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tickets;

class Page extends Model
{
    //
    protected $fillable = ['name', 'alias', 'text', 'images'];
}
