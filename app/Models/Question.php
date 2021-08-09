<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function quis(): BelongsTo
    {
        return $this->belongsTo(Quis::class, 'quis_id', 'id');
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
