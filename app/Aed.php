<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aed extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
}
