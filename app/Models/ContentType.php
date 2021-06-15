<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the ContentType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subSubMateriContent(): BelongsTo
    {
        return $this->belongsTo('App\Models\SubSubMateriContent', 'type_id', 'id');
    }

    public function subMateriContent(): BelongsTo
    {
        return $this->belongsTo('App\Models\SubMateriContent', 'type_id', 'id');
    }
    public function materiContent(): BelongsTo
    {
        return $this->belongsTo('App\Models\SubMateriContent', 'type_id', 'id');
    }
}
