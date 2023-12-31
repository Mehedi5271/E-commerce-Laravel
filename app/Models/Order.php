<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'contact_number',
    //     'shipping_address',
    // ];

    protected $guarded =[];

      /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');

    }
    
}
