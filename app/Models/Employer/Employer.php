<?php

namespace App\Models\Employer;

use App\Transformers\EmployerTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
/**
 * @OA\Schema(
 *      schema="Employer",
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
 */class Employer extends Model
{
    use SoftDeletes, HasFactory, HasApiTokens;    
     
    public $guard = 'employers-api';

    public $sessionGuard = 'employers';

    public $provider = 'employers';

    public $message = [
        'login' => 'Employer login successfully',
        'signup' => 'Employer Signup successfully',
        'not_exist' => 'Employer does not exist',
        'wrong_password' => 'Password Incorrect',
        'logout' => 'Logout Successfully'
    ];

    public $appends = [
        'full_name'
    ];

   /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_candidate_accept' => 'boolean',
        'is_employer_accept' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'is_candidate_accept', 'is_employer_accept',
        'candidate_accepted_at', 'employer_accepted_at', 'status',
        'company_name', 'address', 'position', 'phone_one', 'phone_two',
    ];

    /**
     * The validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|exists:users,id',
        'is_candidate_accept' => 'boolean',
        'is_employer_accept' => 'boolean',
        'candidate_accepted_at' => 'date',
        'employer_accepted_at' => 'date',
        'status' => 'string|in:IN REVIEW,ACTIVE,INACTIVE',
        'company_name' => 'string|max:255',
        'address' => 'string',
        'position' => 'string|max:255',
        'phone_one' => 'string|max:255',
        'phone_two' => 'string|max:255',
    ];

    public function tranform($request)
    {
       return (new EmployerTransformer)->transform($request);
    }

    public function getFullNameAttribute()
    {
        return $this->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
