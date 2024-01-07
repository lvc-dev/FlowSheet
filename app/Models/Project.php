<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type_id'
    ];

    public function pieces() : HasMany {
        return $this->hasMany(Piece::class);
    }

    public function tags() : BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function type() : BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function fileProjects() : HasMany {
        return $this->hasMany(FileProject::class);
    }
}
