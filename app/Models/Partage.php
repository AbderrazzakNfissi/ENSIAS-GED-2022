<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partage extends Model
{
    use HasFactory;

    protected $fillable = [
       'message',
       'email',
       'document',
       'user_id',
       'etat', // vu ??
       'document_name'
    ];
    
              
}
