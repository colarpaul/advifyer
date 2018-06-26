<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Package extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
}
