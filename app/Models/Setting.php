<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validated)
 * @property mixed $id
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'value'
    ];
}
