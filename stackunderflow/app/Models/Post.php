<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_title',
        'post_content',
        'post_img',
        'underflow_id',
        'categorie_id',
        'post_author',
        'user_id',
        'nbr_comments',
        'nbr_likes',
    ];
}
