<?php

namespace App\Enums\status;

enum ContactMessageStatus: int
{
    case UNREAD = 1;

    case READ = 2;

    public function isRead(): bool
    {
        return $this === self::READ;
    }

    public function isUnread(): bool
    {
        return $this === self::UNREAD;
    }

    public function name(): string
    {
        return match ($this) {
            self::READ => 'Read',
            self::UNREAD => 'Unread',
        };
    }

    public function nameAr(): string
    {
        return match ($this) {
            self::READ => 'مقروء',
            self::UNREAD => 'غير مقروء',
        };
    }

    public static function toArray(): array
    {
        return [
            self::READ->value => self::READ->nameAr(),
            self::UNREAD->value => self::UNREAD->nameAr(),
        ];
    }

    public static function allowedValues(): array
    {
        return [
            self::READ->value,
            self::UNREAD->value,
        ];
    }
}
