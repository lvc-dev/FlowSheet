<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'quantity',
        'material',
        'width',
        'height',
        'thickness',
        'description',
        'project_id'
    ];

    protected $attributes = [
        'quantity' => 1
    ];

    public function project() : BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
