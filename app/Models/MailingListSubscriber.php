<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingListSubscriber extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }
}
