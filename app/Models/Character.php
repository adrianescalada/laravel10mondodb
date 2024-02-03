<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use App\Traits\AppliesCriteria;

class Character extends Model
{
    use HasFactory, AppliesCriteria;

    protected $connection = 'mongodb';
    protected  $collection = 'characters';

    protected $fillable = [
        'characterId',
        'name',
        'alternate_names',
        'species',
        'gender',
        'house',
        'dateOfBirth',
        'yearOfBirth',
        'wizard',
        'ancestry',
        'eyeColour',
        'hairColour',
        'wand',
        'patronus',
        'hogwartsStudent',
        'hogwartsStaff',
        'actor',
        'alternate_actors',
        'alive',
        'image',
    ];
}
