<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table ="comments";
    public function User(){
        return $this->BelongsTo(User::class,'user_id','id');
    }
}
