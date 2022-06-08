<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    use HasFactory;

    public $guarded = ['id'];
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

    public function contents()
    {
        return $this->hasMany(SubMateriContent::class,'sub_materi_id','id');
    }

    public function orderContents($row = 'created_at', $sort = 'asc')
    {
        return $this->contents()->orderBy($row, $sort)->get();
    }

    public function subs()
    {
        return $this->hasMany(SubSubMateri::class, 'sub_materi_id', 'id');
    }

    public function orderSubs($row = 'created_at', $sort = 'asc')
    {
        return $this->subs()->orderBy($row, $sort)->get();
    }
}
