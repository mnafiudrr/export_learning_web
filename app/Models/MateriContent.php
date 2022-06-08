<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MateriContent extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    public $fillable = [
        'materi_id',
        'content_type_id',
        'value',
        'row',
    ];
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
