<?php

namespace Modules\Support\Traits\V1\CleanEnum;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Throwable;
use ValueError;

trait CleanEnum
{
    /**
     * Get the enum short name
     */
    private static function shortName(bool $lower = true): string
    {
        $_name = basename(str_replace('\\', '/', get_called_class()));

        return $lower ? Str::snake($_name) : $_name;
    }

    /**
     * Get the module name
     */
    private static function moduleName(bool $lower = true): string
    {
        $_name = explode('\\', __CLASS__)[1];

        return $lower ? strtolower($_name) : $_name;
    }

    /**
     * Get pairs
     */
    public static function pairs(): Collection
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [$case->value => $case->trans()]);
    }

    /**
     * Translate case
     */
    public function trans(): string
    {
        return __('v1.' . self::moduleName() . '::enum.' . self::shortName() . '.' . Str::snake($this->name));
    }

    /**
     * Get the case color
     */
    public function color(): string
    {
        return __('v1.' . self::moduleName() . '::enum.' . self::shortName() . '.colors.' . Str::snake($this->name));
    }

    /**
     * Get case from name
     */
    public static function fromName(string $name): self
    {
        foreach (self::cases() as $case)
        {
            if ($name === strtolower($case->name))
            {
                return $case;
            }
        }

        throw new ValueError("$name is not a valid value for backed-enum of " . self::class);
    }

    /**
     * Get case from name with a try catch block
     */
    public static function tryFromName(string $name): ?self
    {
        try
        {
            foreach (self::cases() as $case)
            {
                if ($name === strtolower($case->name))
                {
                    return $case;
                }
            }
            return null;
        }
        catch (Throwable)
        {
            return null;
        }
    }
}
