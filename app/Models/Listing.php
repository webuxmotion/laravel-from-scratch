<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'description',
        'tags',
        'location',
        'website',
        'email'
    ];

    public function scopeFilter($query, array $filters) {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $searchPhrase = request('search');
            
            $query->where('title', 'like', '%' . $searchPhrase . '%')
                ->orWhere('description', 'like', '%' . $searchPhrase . '%')
                ->orWhere('tags', 'like', '%' . $searchPhrase . '%')
                ->orWhere('company', 'like', '%' . $searchPhrase . '%');
        }
    }
}
