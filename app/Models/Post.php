<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'title';
    }

    protected $filable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'note'
    ];

    protected $with = [
        'category',
        'author'
    ];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query
                    ->where('title','like','%'.$filters['search'].'%')
                    ->orWhere('body','like','%'.$filters['search'].'%')
            )
        );
        
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('name', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('name', $author)
            )
        );
            
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
