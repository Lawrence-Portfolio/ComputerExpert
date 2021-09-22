<?php namespace Bizmark\Expert\Models;

use Model;
use System\Models\File;
use Lovata\Shopaholic\Models\Category;

/**
 * Template Model
 * @package Bizmark\Expert\Models
 *
 * @mixin \October\Rain\Database\Builder
 * @mixin \Eloquent
 *
 * @property int                                                $id
 * @property string                                             $name
 * @property \October\Rain\Argon\Argon                          $created_at
 * @property \October\Rain\Argon\Argon                          $updated_at
 *
 * Relations
 * @property int                                                $category_id
 * @property Category                                           $category
 * @method \October\Rain\Database\Relations\BelongsTo|Category  category()
 *
 * @property Collection[]                                       $collections
 * @method \October\Rain\Database\Relations\HasMany|Collection  collections()
 *
 * @property File                                               $preview_image
 * @method \October\Rain\Database\Relations\AttachOne|File      preview_image()
 */
class Template extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'bizmark_expert_templates';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name',
        'category'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [
        'collections' => Collection::class
    ];
    public $belongsTo = [
        'category' => Category::class
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'preview_image' => [
            File::class,
            'delete' => true
        ]
    ];
    public $attachMany = [];
}
