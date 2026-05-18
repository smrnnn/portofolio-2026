<?php

namespace App\Filament\Admin\Resources\FinalProjectResource\Pages;

use App\Filament\Admin\Resources\FinalProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFinalProjects extends ListRecords
{
    protected static string $resource = FinalProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
