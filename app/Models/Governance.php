<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governance extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'governances';
    protected $fillable = ['name_ar'];

    public function newgovernances()
    {
        return $this->hasMany(Newgovernance::class, 'at_page');
    }
}
