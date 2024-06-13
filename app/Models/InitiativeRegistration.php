<?php

namespace App\Models;

use App\Enums\status\InitiativeRegistrationStatus;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitiativeRegistration extends Model
{
    use HasFactory;
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'initiative_registrations';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    protected $casts = [
        'status' => InitiativeRegistrationStatus::class,
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function showUserButton()
    {
        return '<a href="' . backpack_url('user/' . $this->user_id . '/show') . '" class="btn btn-sm btn-link"><i class="la la-eye me-1"></i> عرض المستخدم</a>';
    }

    public function showInitiativeButton()
    {
        return '<a href="' . backpack_url('initiative/' . $this->initiative_id . '/show') . '" class="btn btn-sm btn-link"><i class="la la-eye me-1"></i> عرض المبادرة</a>';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function initiative()
    {
        return $this->belongsTo(Initiative::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
