<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'name', 'description', 'parent_id', 'status', 'image', 'slug'

    ];

    public static function rules()
    {

       return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'parent_id' => [
                'int', 'exists:categories,id'
            ],
            'image' => [
                'image', 'max:1048576', 'dimensions:min_width=100,min_height=100'
            ],
            'description' => ['required'],
            'status' => ['in:active,archived'],


        ];
    }
}
