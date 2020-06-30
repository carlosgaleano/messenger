<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Message extends Model
{
    //
    protected $casts=[
        'written_by_me'=>'boolean'
    ];
}
