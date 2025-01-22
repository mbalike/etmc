<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMember extends EditRecord
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        try {
            // Your logic to update the member
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                // Handle the foreign key constraint violation
                $this->notify('danger', 'Cannot update the member. Please ensure the supervisor exists.');
            } else {
                throw $e;
            }
        }

        return $data;
    }
}
