<?php namespace Bizmark\Expert\Models;

use Model;
use Lovata\Buddies\Models\User;
use Lovata\Shopaholic\Models\Product;

/**
 * Config Model
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
 * @property array                                              $additional_discs
 * @property array                                              $coolers
 * @property \October\Rain\Argon\Argon                          $created_at
 * @property \October\Rain\Argon\Argon                          $updated_at
 *
 * Relations
 * @property int                                                $user_id
 * @property User                                               $user
 * @method \October\Rain\Database\Relations\BelongsTo|User      user()
 *
 * @property int                                                $cpu_id
 * @property Product                                            $cpu
 * @method \October\Rain\Database\Relations\BelongsTo|Product   cpu()
 *
 * @property int                                                $motherboard_id
 * @property Product                                            $motherboard
 * @method \October\Rain\Database\Relations\BelongsTo|Product   motherboard()
 *
 * @property int                                                $ram_id
 * @property Product                                            $ram
 * @method \October\Rain\Database\Relations\BelongsTo|Product   ram()
 *
 * @property int                                                $cooling_id
 * @property Product                                            $cooling
 * @method \October\Rain\Database\Relations\BelongsTo|Product   colling()
 *
 * @property int                                                $gpu_id
 * @property Product                                            $gpu
 * @method \October\Rain\Database\Relations\BelongsTo|Product   gpu()
 *
 * @property int                                                $disc_id
 * @property Product                                            $disc
 * @method \October\Rain\Database\Relations\BelongsTo|Product   disc()
 *
 * @property int                                                $case_id
 * @property Product                                            $case
 * @method \October\Rain\Database\Relations\BelongsTo|Product   case()
 *
 * @property int                                                $power_id
 * @property Product                                            $power
 * @method \October\Rain\Database\Relations\BelongsTo|Product   power()
 *
 * @property int                                                $monitor_id
 * @property Product                                            $monitor
 * @method \October\Rain\Database\Relations\BelongsTo|Product   monitor()
 *
 * @property int                                                $keyboard_id
 * @property Product                                            $keyboard
 * @method \October\Rain\Database\Relations\BelongsTo|Product   keyboard()
 *
 * @property int                                                $mouse_id
 * @property Product                                            $mouse
 * @method \October\Rain\Database\Relations\BelongsTo|Product   mouse()
 *
 * @property int                                                $audio_id
 * @property Product                                            $audio
 * @method \October\Rain\Database\Relations\BelongsTo|Product   audio()
 *
 * @property int                                                $microphone_id
 * @property Product                                            $microphone
 * @method \October\Rain\Database\Relations\BelongsTo|Product   microphone()
 *
 * @property int                                                $office_suite_id
 * @property Product                                            $office_suite
 * @method \October\Rain\Database\Relations\BelongsTo|Product   office_suite()
 *
 * @property int                                                $anitivirus_id
 * @property Product                                            $anitivirus
 * @method \October\Rain\Database\Relations\BelongsTo|Product   anitivirus()
 *
 * @property int                                                $os_id
 * @property Product                                            $os
 * @method \October\Rain\Database\Relations\BelongsTo|Product   os()
 */
class Config extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'bizmark_expert_configs';

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
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [
        'coolers',
        'additional_discs',
    ];

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
    public $hasMany = [];
    public $belongsTo = [
        'user' => User::class,
        'cpu' => Product::class,
        'motherboard' => Product::class,
        'ram' => Product::class,
        'cooling' => Product::class,
        'gpu' => Product::class,
        'disc' => Product::class,
        'case' => Product::class,
        'power' => Product::class,
        'monitor' => Product::class,
        'keyboard' => Product::class,
        'mouse' => Product::class,
        'audio' => Product::class,
        'microphone' => Product::class,
        'office_suite' => Product::class,
        'anitivirus' => Product::class,
        'os' => Product::class,
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
