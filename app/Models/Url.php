<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Url extends Model
{
    use HasFactory, Notifiable;

    //
    protected $fillable =['long_url','short_url','user_id' , 'visit_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
