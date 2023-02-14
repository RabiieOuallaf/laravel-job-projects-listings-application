<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query , array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%')->get();
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')->get()
                ->orWhere('description', 'like', '%'. request('search') . '%')->get()
                ->orWhere('tags', 'like', '%' . request('search') . '%')->get();
                    
        }
    }
}
