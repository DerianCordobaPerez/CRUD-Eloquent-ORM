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
class RolesUser extends Model {
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'role_id'];
    public $incrementing = true;

    public function users() {
        $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function roles() {
        $this->belongsTo(Roles::class, 'id', 'role_id');
    }
}
