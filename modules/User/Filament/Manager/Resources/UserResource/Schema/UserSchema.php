<?php

namespace Modules\User\Filament\Manager\Resources\UserResource\Schema;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Modules\Security\Entities\V1\Permission\RoleFields;
use Modules\Support\Contracts\V1\Schema\Schema;
use Modules\Support\Enums\V1\Entities\Entities;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Enums\V1\AccountType\AccountType;

class UserSchema extends Schema
{
    /**
     * Design the form schema
     *
     * @return array
     */
    public static function form(): array
    {
        return [
            TextInput::make(UserFields::MOBILE)
                     ->unique(ignoreRecord: true)
                     ->extraAttributes(['dir' => 'ltr'])
                     ->requiredWithout(UserFields::EMAIL)
                     ->translateLabel(),

            TextInput::make(UserFields::EMAIL)
                     ->unique(ignoreRecord: true)
                     ->extraAttributes(['dir' => 'ltr'])
                     ->requiredWithout(UserFields::MOBILE)
                     ->translateLabel(),

            TextInput::make(UserFields::USERNAME)
                     ->unique(ignoreRecord: true)
                     ->extraAttributes(['dir' => 'ltr'])
                     ->translateLabel(),

            TextInput::make(UserFields::PASSWORD)
                     ->translateLabel()
                     ->extraAttributes(['dir' => 'ltr'])
                     ->password()
                     ->hint(fn(string $operation): ?string => $operation === 'edit' ? __('Leave it empty if no changes needed') : null)
                     ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                     ->dehydrated(fn(?string $state): bool => filled($state))
                     ->required(fn(string $operation): bool => $operation === 'create'),

            Select::make(UserFields::ACCOUNT_TYPE)
                  ->translateLabel()
                  ->native(false)
                  ->required()
                  ->disabled(fn(string $operation): bool => $operation !== 'create')
                  ->options(fn(string $operation): Collection => $operation === 'create' ? AccountType::createablePairs() : AccountType::pairs())
                  ->hintIcon('heroicon-o-exclamation-circle')
                  ->hintIconTooltip(__('Only Manager accounts are able to see panel')),

            Select::make(UserFields::ACCOUNT_STATUS)
                  ->translateLabel()
                  ->native(false)
                  ->required()
                  ->disabled(fn(string $operation): bool => $operation !== 'create')
                  ->options(fn(string $operation): Collection => $operation === 'create' ? AccountStatus::createablePairs() : AccountStatus::pairs())
                  ->hintIcon('heroicon-o-exclamation-circle')
                  ->hintIconTooltip(__('Only Free accounts are able to authenticate')),

            DateTimePicker::make(UserFields::EMAIL_VERIFIED_AT)
                          ->translateLabel()
                          ->hiddenOn('create')
                          ->placeholder(__('Not verified'))
                          ->disabled()
                          ->displayFormat('l d F Y - H:i:s')
                          ->closeOnDateSelection()
                          ->jalali(),

            DateTimePicker::make(UserFields::MOBILE_VERIFIED_AT)
                          ->translateLabel()
                          ->hiddenOn('create')
                          ->placeholder(__('Not verified'))
                          ->disabled()
                          ->displayFormat('l d F Y - H:i:s')
                          ->closeOnDateSelection()
                          ->jalali(),

            Select::make(UserFields::ROLES)
                  ->translateLabel()
                  ->relationship(Entities::Role->table(), RoleFields::DISPLAY_NAME)
                  ->options(v1_role()->all()->pluck(RoleFields::DISPLAY_NAME, RoleFields::ID))
                  ->searchable()
                  ->multiple()
                  ->minItems(1)
                  ->required()
                  ->native(false),
        ];
    }

    /**
     * Design the table schema
     *
     * @return array
     */
    public static function table(): array
    {
        return [
            TextColumn::make(UserFields::ID)
                      ->translateLabel(),

            TextColumn::make(UserFields::MOBILE)
                      ->translateLabel()
                      ->searchable()
                      ->copyable()
                      ->color(fn(Model $record) => isset($record->{UserFields::MOBILE}) ? Color::Blue : false)
                      ->default(__('Not Entered'))
                      ->extraAttributes(['dir' => 'ltr']),

            TextColumn::make(UserFields::EMAIL)
                      ->translateLabel()
                      ->searchable()
                      ->copyable()
                      ->color(fn(Model $record) => isset($record->{UserFields::EMAIL}) ? Color::Blue : false)
                      ->default(__('Not Entered'))
                      ->extraAttributes(['dir' => 'ltr']),

            TextColumn::make(UserFields::USERNAME)
                      ->translateLabel()
                      ->searchable()
                      ->copyable()
                      ->color(fn(Model $record) => isset($record->{UserFields::USERNAME}) ? Color::Blue : false)
                      ->default(__('Not Entered'))
                      ->prefix(fn(Model $record) => isset($record->{UserFields::USERNAME}) ? '@' : null)
                      ->extraAttributes(['dir' => 'ltr']),

            TextColumn::make(UserFields::ACCOUNT_TYPE)
                      ->translateLabel()
                      ->badge()
                      ->color(fn(Model $record) => $record->{UserFields::ACCOUNT_TYPE}->color())
                      ->formatStateUsing(fn(Model $record) => $record->{UserFields::ACCOUNT_TYPE}->trans()),

            TextColumn::make(UserFields::ACCOUNT_STATUS)
                      ->translateLabel()
                      ->badge()
                      ->color(fn(Model $record) => $record->{UserFields::ACCOUNT_STATUS}->color())
                      ->formatStateUsing(fn(Model $record) => $record->{UserFields::ACCOUNT_STATUS}->trans()),

            TextColumn::make(UserFields::CREATED_AT)
                      ->translateLabel()
                      ->formatStateUsing(fn(Model $record): string => jdate($record->created_at)->format('Y/m/d'))
                      ->description(fn(Model $record): string => jdate($record->created_at)->ago()),
        ];
    }

    /**
     * Design the wrapped form schema
     *
     * @return array
     */
    public static function wrappedForm(): array
    {
        return [
            Section::make()
                   ->columns()
                   ->schema(self::form()),
        ];
    }
}
