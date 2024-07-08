<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use CrudTrait; // Enables CRUD operations via Backpack
    use HasFactory; // Laravel's HasFactory trait for model factories

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'faqs'; // Specifies the table name in the database
    // protected $primaryKey = 'id'; // You can specify a custom primary key if needed
    // public $timestamps = false; // Uncomment if you don't want Laravel to manage timestamps
    protected $guarded = ['id']; // The 'id' field is guarded, meaning it won't be mass assignable
    // protected $fillable = []; // Alternatively, specify fields that are fillable
    // protected $hidden = []; // Specify any fields that should be hidden from JSON output

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

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
