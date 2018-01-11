<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    //This is the accessor for the upperLetter
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
    //This is the mutator so that it gets saved in the database for the accessor above
    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = ucfirst($value);
    }
}
