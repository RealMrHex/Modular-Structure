<?php

namespace Modules\User\Filament\Manager\Resources\UserResource\Pages;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Filament\Manager\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->verifyEmailAction(),
            $this->verifyMobileAction(),
            $this->restrictAccessAction(),
            $this->deleteAction(),
        ];
    }

    protected function restrictAccessAction()
    {
        return Action::make('Restrict Access')
                     ->translateLabel()
                     ->color('warning')
                     ->visible(fn(Model $record) => $this->canRestrictAccess($record))
                     ->requiresConfirmation()
        ;
    }

    protected function canRestrictAccess(Model $record): bool
    {
        return $record->{UserFields::ACCOUNT_STATUS} === AccountStatus::Free && $record->{UserFields::ID} !== auth()->id();
    }

    protected function verifyEmailAction()
    {
        return Action::make('Verify Email')
                     ->translateLabel()
                     ->color('success')
                     ->visible(fn($record) => $this->canVerifyEmail($record))
                     ->requiresConfirmation()
                     ->action(function (Model $record)
                     {
                         $record->update([UserFields::EMAIL_VERIFIED_AT => Carbon::now()]);
                         $this->refreshFormData([UserFields::EMAIL_VERIFIED_AT]);
                         Notification
                             ::make()
                             ->title(__('Email verified successfully'))
                             ->success()
                             ->icon('heroicon-o-check-badge')
                             ->send()
                         ;
                     })
                     ->modalIcon('heroicon-o-envelope')
                     ->modalCloseButton(false)
        ;
    }

    protected function verifyMobileAction()
    {
        return Action::make('Verify Mobile')
                     ->translateLabel()
                     ->color('success')
                     ->visible(fn(Model $record) => $this->canVerifyMobile($record))
                     ->requiresConfirmation()
                     ->action(function (Model $record)
                     {
                         $record->update([UserFields::MOBILE_VERIFIED_AT => Carbon::now()]);
                         $this->refreshFormData([UserFields::MOBILE_VERIFIED_AT]);
                         Notification
                             ::make()
                             ->title(__('Mobile verified successfully'))
                             ->success()
                             ->icon('heroicon-o-check-badge')
                             ->send()
                         ;
                     })
                     ->modalIcon('heroicon-o-device-phone-mobile')
                     ->modalCloseButton(false)
        ;
    }

    protected function deleteAction()
    {
        return DeleteAction::make()
                           ->visible(fn(Model $record) => $this->canDelete($record))
        ;
    }

    /**
     * Can delete record
     *
     * @param Model $record
     *
     * @return bool
     */
    protected function canDelete(Model $record): bool
    {
        return $record->{UserFields::ACCOUNT_TYPE}->notClassified() && $record->{UserFields::ID} !== auth()->id();
    }

    /**
     * Can verify mobile
     *
     * @param Model $record
     *
     * @return bool
     */
    protected function canVerifyMobile(Model $record): bool
    {
        return isset($record->{UserFields::MOBILE}) && empty($record->{UserFields::MOBILE_VERIFIED_AT}) && $record->{UserFields::ACCOUNT_TYPE}->notClassified();
    }

    /**
     * Can verify email
     *
     * @param Model $record
     *
     * @return bool
     */
    protected function canVerifyEmail(Model $record): bool
    {
        return isset($record->{UserFields::EMAIL}) && empty($record->{UserFields::EMAIL_VERIFIED_AT}) && $record->{UserFields::ACCOUNT_TYPE}->notClassified();
    }
}
