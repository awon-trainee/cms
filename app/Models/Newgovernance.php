<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewGovernance extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'newgovernances';
    protected $guarded = ['id'];
    protected $fillable = ['title', 'file', 'at_page'];

    // Define the relationship to Governance
    public function governance()
    {
        return $this->belongsTo(Governance::class, 'at_page');
    }
}