<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Category
 * @package App\Models
 * @version August 3, 2020, 6:46 am UTC
 *
 * @property integer $cat_id
 * @property string $title
 * @property string $slug
 */
class Category extends Model
{

    public $table = 'categories';
    



    public $fillable = [
        'cat_id',
        'title',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cat_id' => 'integer',
        'title' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'slug' => 'required'
    ];

    
}
