<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    use HasFactory;

    /**
     * Get the materi that owns the SubMateri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materi(): BelongsTo
    {
        return $this->belongsTo('App\Models\Materi', 'materi_id', 'id');
    }


    public function subMateriContents(): HasMany
    {
        return $this->hasMany('App\Models\SubMateriContent', 'sub_materi_id', 'id');
    }

    /**
     * Get all of the subsubmateri for the SubMateri
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subSubMateri(): HasMany
    {
        return $this->hasMany('App\Models\SubSubMateri', 'sub_materi_id', 'id');
    }
}
