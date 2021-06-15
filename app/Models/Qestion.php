<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qestion extends Model
{
    use HasFactory;

    /**
     * Get the quis that owns the Qestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quis(): BelongsTo
    {
        return $this->belongsTo(User::class, 'quis_id', 'id');
    }

    /**
     * Get all of the options for the Qestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany('App\Models\Option', 'question_id', 'id');
    }
}
