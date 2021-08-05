<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//Detail Sub Sub Materi Table
class DetailSsm extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'detail_ssm';


  /**
     * Get the ssm that owns the detail ssm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subSubMateri(): BelongsTo
    {
        return $this->belongsTo('App\Models\SubSubMateri', 'sub_sub_materi_id', 'id');
    }

    public function detailSsmContents(): HasMany
    {
        return $this->hasMany('App\Models\DetailSsmContent', 'detail_ssm_id', 'id');
    }
}
