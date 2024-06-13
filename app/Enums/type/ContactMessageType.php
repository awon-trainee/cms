<?php

namespace App\Enums\type;

enum ContactMessageType: int
{
    case SUGGESTION = 1;

    case INQUIRY = 2;

    case COMPLAINT = 3;

    public function isSuggestion(): bool
    {
        return $this === self::SUGGESTION;
    }

    public function isInquiry(): bool
    {
        return $this === self::INQUIRY;
    }

    public function isComplaint(): bool
    {
        return $this === self::COMPLAINT;
    }

    public function name(): string
    {
        return match ($this) {
            self::SUGGESTION => 'Suggestion',
            self::COMPLAINT => 'Complaint',
            self::INQUIRY => 'Inquiry',
        };
    }

    public function nameAr(): string
    {
        return match ($this) {
            self::SUGGESTION => 'اقتراح',
            self::INQUIRY => 'استفسار',
            self::COMPLAINT => 'شكوى',
        };
    }

    public static function toArray(): array
    {
        return [
            self::SUGGESTION->value => self::SUGGESTION->nameAr(),
            self::INQUIRY->value => self::INQUIRY->nameAr(),
            self::COMPLAINT->value => self::COMPLAINT->nameAr(),
        ];
    }

    public static function allowedValues(): array
    {
        return [
            self::SUGGESTION->value,
            self::INQUIRY->value,
            self::COMPLAINT->value,
        ];
    }
}
