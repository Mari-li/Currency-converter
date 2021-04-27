<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static updateOrCreate(array $array, array $array1)
 * @method static find(string $getCode)
 * @method static findOrFail(string $getCode)
 * @method static upsert(array $array, string[] $array1, string[] $array2)
 * @property mixed slug
 */
class Currency extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $keyType = 'string';

    protected  $fillable = [
        'code',
        'rate',
    ];




}

