<?php

namespace App\Models;

use App\Enums\status\ContactMessageStatus;
use App\Enums\type\ContactMessageType;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'contact_messages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    protected $casts = [
        'type' => ContactMessageType::class,
        'status' => ContactMessageStatus::class,
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function markAsReadOrUnreadButton(): string
    {
        if ($this->status->isRead()) {
            return '<a href="' . backpack_url('contact-message/' . $this->id . '/mark-as-unread') . '" class="btn btn-sm btn-link" title="Mark as unread"><i class="la la-eye-slash me-1"></i> تحديد كغير مقروءة</a>';
        }else{
            return '<a href="' . backpack_url('contact-message/' . $this->id . '/mark-as-read') . '" class="btn btn-sm btn-link" title="Mark as read"><i class="la la-eye me-1"></i> تحديد كمقروءة</a>';
        }
    }

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

    public function scopeUnread($query)
    {
        return $query->where('status', ContactMessageStatus::UNREAD);
    }

    public function scopeRead($query)
    {
        return $query->where('status', ContactMessageStatus::READ);
    }

    public function scopeSuggestion($query)
    {
        return $query->where('type', ContactMessageType::SUGGESTION);
    }

    public function scopeComplaint($query)
    {
        return $query->where('type', ContactMessageType::COMPLAINT);
    }

    public function scopeInquiry($query)
    {
        return $query->where('type', ContactMessageType::INQUIRY);
    }

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
