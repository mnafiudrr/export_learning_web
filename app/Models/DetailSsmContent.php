<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSsmContent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'detail_ssm_contents';

    public function detailSsm(): BelongsTo
    {
        return $this->belongsTo('App\Models\DetailSsm', 'detail_ssm_id', 'id');
    }

    public function contentType(): BelongsTo
    {
        return $this->belongsTo('App\Models\ContentType', 'content_type_id', 'id');
    }
}
