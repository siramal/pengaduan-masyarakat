<?php

namespace App\Models;
use App\Models\Comment;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'province_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
        'report_type',
        'report_detail',
        'image_path',
        'user_id',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
