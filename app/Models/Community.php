<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description'   
    ];


    public function posts(){
        return $this->hasOne(Post::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'community_user');
    }
}
