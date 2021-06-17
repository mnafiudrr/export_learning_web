<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    /**
     * Get all of the materiContents for the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    protected $guarded = ['id'];
    public function materiContents(): HasMany
    {
        return $this->hasMany('App\Models\MateriContent', 'materi_id', 'id');
    }

    /**
     * Get all of the comments for the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subMateris(): HasMany
    {
        return $this->hasMany('App\Models\SubMateri', 'materi_id', 'id');
    }
}
