<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class, 'attribute_group_id');
    }

    public function attributeProducts()
    {
        return $this->hasMany(AttributeProduct::class, 'attribute_value_id');
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}
