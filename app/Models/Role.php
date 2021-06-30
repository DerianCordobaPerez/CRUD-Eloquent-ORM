<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed name
 * @mixin Builder
 */
class Role extends Model {
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
