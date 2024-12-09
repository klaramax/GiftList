<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'url',
        'where_bought',
        'user_id',
    ];

    /**
     * Get the user that owns the gift.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the persons that this gift is assigned to.
     */
    public function persons()
    {
        return $this->belongsToMany(Person::class);
    }
}
