<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
