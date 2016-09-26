<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
