<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    // Table Name
    protected $table = 'requirements';

    // Primary Key
    protected $primaryKey = 'type';

    // Disable Incrementing
    public $incrementing = false;

    // Key Type
    protected $keyType = 'string';

    // Timestamps
    public $timestamps = false;

    // Fillable Attributes
    protected $fillable = [
        'type',
    ];
}
