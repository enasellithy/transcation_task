<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transactions';

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id')->withTrashed();
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id')->withTrashed();
    }
}
