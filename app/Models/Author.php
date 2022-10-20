<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'given_name',
        'family_name',
        'is_company',
    ];

    /**
     * Create the author may write MANY books relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books() {
        return $this->belongsToMany(Book::class);
    }
}
