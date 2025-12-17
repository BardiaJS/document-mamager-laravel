<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'creator',
        'create_date',
        'is_document_admin_signed',
        'is_document_manager_signed',
        'is_boss_signed' , 
    ];

    protected $attributes = [
        'is_document_admin_signed' => false,
        'is_document_manager_signed' => false,
        'is_boss_signed' => false,
        
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($document) {
            if (auth()->check()) {
                $document->user_id = auth()->id();
            }
        });
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
