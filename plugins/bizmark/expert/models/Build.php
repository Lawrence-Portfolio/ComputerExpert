<?php namespace Bizmark\Expert\Models;

use Model;
use Lovata\Shopaholic\Models\Product;

/**
 * Build Model
 * @package Bizmark\Expert\Models
 *
 * @mixin \October\Rain\Database\Builder
 * @mixin \Eloquent
 *
 * @property int                                                $id
 * @property bool                                               $active
 * @property string                                             $name
 * @property string                                             $slug
 * @property string                                             $code
 * @property \October\Rain\Argon\Argon                          $created_at
 * @property \October\Rain\Argon\Argon                          $updated_at
 *
 * Relations
 * @property int                                                $product_id
 * @property Product                                            $product
 * @method \October\Rain\Database\Relations\BelongsTo|Product   product()
 *
 * @property Collection[]                                       $reviews
 * @method \October\Rain\Database\Relations\HasMany|Collection  collections()
 */
class Build extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'bizmark_expert_builds';

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
        'slug',
        'code',
        'product'
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
        'product' => Product::class
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
