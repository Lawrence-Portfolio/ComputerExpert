<?php namespace Bizmark\Expert\Models;

use Model;
use Lovata\Shopaholic\Models\Product;

/**
 * Collection Model
 * @package Bizmark\Expert\Models
 *
 * @mixin \October\Rain\Database\Builder
 * @mixin \Eloquent
 *
 * @property int                                                $id
 * @property int                                                $sort_order
 * @property \October\Rain\Argon\Argon                          $created_at
 * @property \October\Rain\Argon\Argon                          $updated_at
 *
 * Relations
 * @property int                                                $template_id
 * @property Template                                           $template
 * @method \October\Rain\Database\Relations\BelongsTo|Product   template()
 *
 * @property int                                                $build_id
 * @property Build                                              $build
 * @method \October\Rain\Database\Relations\BelongsTo|Product   build()
 *
 * @property int                                                $default_id
 * @property Product                                            $default
 * @method \October\Rain\Database\Relations\BelongsTo|Product   default()
 *
 * @property Product[]                                          $products
 * @method \October\Rain\Database\Relations\HasMany|Product     products()
 */
class Collection extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'bizmark_expert_collections';

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
        'template',
        'build',
        'default'
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
        'products' => [
            Product::class,
            'key' => 'collection_id'
        ]
    ];
    public $belongsTo = [
        'template' => Template::class,
        'build' => Build::class,
        'default' => Product::class
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
