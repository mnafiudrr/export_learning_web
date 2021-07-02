<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriContent extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    /**
     * Get the materi that owns the MateriContent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materi(): BelongsTo
    {
        return $this->belongsTo('App\Models\Materi', 'materi_id', 'id');
    }

    /**
     * Get the contentType that owns the MateriContent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contentType(): BelongsTo
    {
        return $this->belongsTo('App\Models\ContentType', 'type_od', 'id');
    }
}
