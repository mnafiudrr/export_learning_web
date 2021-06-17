<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubMateri extends Model
{
    use HasFactory;

    /**
     * Get the materi that owns the SubMateri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subMateri(): BelongsTo
    {
        return $this->belongsTo('App\Models\SubMateri', 'sub_materi_id', 'id');
    }


    public function subSubMateriContents(): HasMany
    {
        return $this->hasMany('App\Models\SubSubMateriContent', 'sub_sub_materi_id', 'id');
    }
}
