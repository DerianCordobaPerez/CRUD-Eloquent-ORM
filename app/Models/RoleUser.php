<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed user_id
 * @property mixed role_id
 * @mixin Builder
 */
class RoleUser extends Model {
    use HasFactory;

    protected $table = 'role_user';
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'role_id'];
    public $incrementing = true;
}
