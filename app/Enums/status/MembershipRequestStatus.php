<?php

namespace App\Enums\status;

enum MembershipRequestStatus: int
{
    case PENDING = 1;

    case ACCEPTED = 2;

    case REJECTED = 3;

    public function isPending(): bool
    {
        return $this === self::PENDING;
    }

    public function isAccepted(): bool
    {
        return $this === self::ACCEPTED;
    }

    public function isRejected(): bool
    {
        return $this === self::REJECTED;
    }

    public function name(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::ACCEPTED => 'Accepted',
            self::REJECTED => 'Rejected',
        };
    }

    public function nameAr(): string
    {
        return match ($this) {
            self::PENDING => 'في الانتظار',
            self::ACCEPTED => 'مقبول',
            self::REJECTED => 'مرفوض',
        };
    }

    public static function toArray(): array
    {
        return [
            self::PENDING->value => self::PENDING->nameAr(),
            self::ACCEPTED->value => self::ACCEPTED->nameAr(),
            self::REJECTED->value => self::REJECTED->nameAr(),
        ];
    }

    public static function allowedValues(): array
    {
        return [
            self::PENDING->value,
            self::ACCEPTED->value,
            self::REJECTED->value,
        ];
    }
}
