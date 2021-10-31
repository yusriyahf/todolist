<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'list';
    protected $primaryKey = 'id';
    public $incrementing = true;
}