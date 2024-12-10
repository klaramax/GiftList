<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
     * Get the user that owns the person.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the gifts assigned to the person.
     */
    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }
}
