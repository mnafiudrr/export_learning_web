<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubMateriContent extends Model
{
    use HasFactory;

    public function subSubMateri(): BelongsTo
    {
        return $this->belongsTo('App\Models\SubSubMateri', 'sub_sub_materi', 'id');
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
