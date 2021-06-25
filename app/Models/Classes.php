<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed code
 * @property mixed name
 * @property mixed credit
 * @mixin Builder
 */
class Classes extends Model {
    use HasFactory;

    protected $connection = 'mysql';
    protected $primaryKey = 'code';
    protected $fillable = ['code', 'name', 'credit'];
    public $timestamps = false;
}
