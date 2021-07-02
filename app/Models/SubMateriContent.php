<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMateriContent extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function subMateri(): BelongsTo
    {
        return $this->belongsTo('App\Models\SubMateri', 'sub_materi', 'id');
    }

    /**
     * Get the contentType that owns the MateriContent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contentType(): BelongsTo
    {
        return $this->belongsTo('App\Models\ContentType', 'type_id', 'id');
    }
}
