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
     * Return the full name of the author
     *
     * Default is Given - Family order (true)
     *
     * @param $direction Given-Family (true) or Family-Given (false)
     * @return string
     */
    public function fullName($direction = true): string
    {
        return $direction ? "{$this->given_name} {$this->family_name}" : "{$this->family_name} {$this->given_name}";
    }


    /**
     * Create the author may write MANY books relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
