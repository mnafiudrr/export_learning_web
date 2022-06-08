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
    protected $fillable = ['title', 'logo', 'header', 'number'];

    public function materiContents(): HasMany
    {
        return $this->hasMany(MateriContent::class, 'materi_id', 'id');
    }

    public function contents()
    {
        return $this->hasMany(MateriContent::class, 'materi_id', 'id');
    }

    public function orderContents($row = 'created_at', $sort = 'asc')
    {
        return $this->contents()->orderBy($row, $sort)->get();
    }
    /**
     * Get all of the comments for the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subMateris(): HasMany
    {
        return $this->hasMany(SubMateri::class, 'materi_id', 'id');
    }

    public function subs()
    {
        return $this->hasMany(SubMateri::class, 'materi_id', 'id');
    }

    public function orderSubs($row = 'created_at', $sort = 'asc')
    {
        return $this->subs()->orderBy($row, $sort)->get();
    }
}
