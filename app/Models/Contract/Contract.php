<?php

namespace App\Models\Contract;

use App\Models\Employer\Employer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Contract extends Model
{
 use SoftDeletes, HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employer_id', 'company_name', 'location', 'experience', 'from_start', 'to_date',
        'shift_type', 'schedule', 'is_travel_allowance', 'is_meal_allowance', 'is_accomadation_allowance',
        'travel_allowance_amount', 'meal_allowance_amount', 'rate_type', 'rate_amount', 'notes',
        'posting_start_date', 'posting_end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
     'is_travel_allowance' => 'boolean',
     'is_meal_allowance' => 'boolean',
     'is_accomadation_allowance' => 'boolean',
     'travel_allowance_amount' => 'decimal:2',
     'meal_allowance_amount' => 'decimal:2',
     'rate_amount' => 'decimal:2',
     'posting_start_date' => 'date',
     'posting_end_date' => 'date',
    ];

    /**
     * The validation rules.
     *
     * @var array
     */
    public static $rules = [
        'employer_id' => 'required|exists:employers,id',
        'company_name' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'experience' => 'nullable|string|max:255',
        'from_start' => 'nullable|date',
        'to_date' => 'nullable|date',
        'shift_type' => 'nullable|string|max:255',
        'schedule' => 'nullable|string|max:255',
        'is_travel_allowance' => 'boolean',
        'is_meal_allowance' => 'boolean',
        'is_accomadation_allowance' => 'boolean',
        'travel_allowance_amount' => 'nullable|numeric|min:0',
        'meal_allowance_amount' => 'nullable|numeric|min:0',
        'rate_type' => 'string|nullable',
        'rate_amount' => 'nullable|numeric|min:0',
        'notes' => 'string|nullable',
        'posting_start_date' => 'date|nullable',
        'posting_end_date' => 'date|nullable',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

   }
