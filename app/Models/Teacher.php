<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed lastName
 * @property mixed title
 * @mixin Builder
 */
class Teacher extends Model {
    use HasFactory;

    protected $connection = 'mysql';
    protected $fillable = ['id', 'name', 'lastName', 'title'];
    public $timestamps = false;
}
