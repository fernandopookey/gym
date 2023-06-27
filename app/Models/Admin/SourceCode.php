<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceCode extends Model
{
    use HasFactory;


    protected $fillable = [
        'name'
    ];
}
