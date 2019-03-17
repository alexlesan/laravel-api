<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['hash', 'prev_hash', 'is_valid'];


    /**
     * defining relation with transactions table
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'list_id');
    }

}
