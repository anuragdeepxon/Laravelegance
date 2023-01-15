<?php

namespace App\Models\Agency;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'agencies';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'phone', 'address', 'website', 'logo', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'website' => 'nullable|string|max:255',
        'logo' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
