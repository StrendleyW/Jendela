<?php

namespace App\Filament\Admin\Resources\FactCheckArticleResource\Pages;

use App\Filament\Admin\Resources\FactCheckArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFactCheckArticles extends ListRecords
{
    protected static string $resource = FactCheckArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
