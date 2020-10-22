<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigApp extends Model
{
    //
    protected $table = 'config';

    public function getValue()
    {
        return stringTo($this->type, $this->values);
    }
}
