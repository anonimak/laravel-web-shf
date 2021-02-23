<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Shetabit\Visitor\Traits\Visitable;

class VisitorUser extends Model
{
    protected $table = 'shetabit_visits';

    use Visitable;
}
