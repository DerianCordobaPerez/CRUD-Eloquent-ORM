<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed location
 * @mixin Builder
 */
class ClassRoom extends Model {
    use HasFactory;

    protected $connection = 'mysql';
    protected $fillable = ['id', 'name', 'location'];
    public $timestamps = false;
}
