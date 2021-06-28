<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed code_class
 * @property mixed teacher_id
 * @property mixed classroom_id
 * @mixin Builder
 */
class Imparts extends Model {
    use HasFactory;

    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['code_class', 'teacher_id', 'classroom_id'];
    public $incrementing = true;

    public function class() {
        $this->belongsTo(Classes::class, 'code', 'code_class');
    }

    public function teacher() {
        $this->belongsTo(Teacher::class, 'id', 'teacher_id');
    }

    public function classroom() {
        $this->belongsTo(ClassRoom::class, 'id', 'classroom_id');
    }
}
