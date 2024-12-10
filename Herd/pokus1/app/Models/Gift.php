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
        'person_id',
    ];

    /**
     * Get the user that created the gift
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the person that this gift is assigned to.
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
