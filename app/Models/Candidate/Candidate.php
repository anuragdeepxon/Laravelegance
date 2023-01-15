<?php

namespace App\Models\Candidate;

use App\Models\ForgetPasswordOtp;
use App\Transformers\CandidateTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

/**
 * @OA\Schema(
 *      schema="Candidate",
 *      required={},
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class Candidate extends Model
{
     use SoftDeletes,HasFactory, HasApiTokens;    
     
     public $table = 'candidates';
     
     public $guard = 'candidates-api';
 
     public $sessionGuard = 'candidates';
 
     public $provider = 'candidates';
 
     public $message = [
         'login' => 'candidates login successfully',
         'signup' => 'candidates Signup successfully',
         'not_exist' => 'candidates does not exist',
         'wrong_password' => 'Password Incorrect',
         'logout' => 'Logout Successfully'
     ];
 
     public $appends =[
        'full_name'
     ];

     protected $fillable = [
         'user_id',
         'address',
         'regulatory_college',
         'regulatory_college_no',
         'experience',
         'resume',
         'is_travel_allowance',
         'is_meal_allowance',
         'is_accomadation_allowance',
         'travel_allowance_amount',
         'meal_allowance_amount',
         'accommodation_allowance_amount',
         'rate_type',
         'rate_amount',
         'notes',
         'shift_type',
     ];
 
     protected $casts = [
         'is_travel_allowance' => 'boolean',
         'is_meal_allowance' => 'boolean',
         'is_accomadation_allowance' => 'boolean',
         'travel_allowance_amount' => 'decimal:2',
         'meal_allowance_amount' => 'decimal:2',
         'accommodation_allowance_amount' => 'decimal:2',
         'rate_amount' => 'decimal:2',
     ];
 
     public static $rules = [
         'user_id' => 'required|integer',
         'address' => 'nullable|string',
         'regulatory_college' => 'nullable|string',
         'regulatory_college_no' => 'nullable|string',
         'experience' => 'nullable|string',
         'resume' => 'nullable|string',
         'is_travel_allowance' => 'boolean',
         'is_meal_allowance' => 'boolean',
         'is_accomadation_allowance' => 'boolean',
         'travel_allowance_amount' => 'nullable|numeric',
         'meal_allowance_amount' => 'nullable|numeric',
         'accommodation_allowance_amount' => 'nullable|numeric',
         'rate_type' => 'nullable|string',
         'rate_amount' => 'nullable|numeric',
         'notes' => 'nullable|string',
         'shift_type' => 'nullable|string',
     ];

     public function hasOtp()
     {
        return $this->hasOne(ForgetPasswordOtp::class,'model_id','id')->where('model_type',self::class);
     }

     public function tranform($request)
     {
        return (new CandidateTransformer)->transform($request);
     }

     public function getFullNameAttribute()
     {
        return $this->first_name." ".$this->last_name;
     }

     public function user()
     {
         return $this->belongsTo(User::class);
     }
    
}
