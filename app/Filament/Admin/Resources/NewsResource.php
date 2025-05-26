<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\NewsResource\Pages;
use App\Filament\Admin\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, callable $set) {
                    $set('slug', Str::slug($state));
                }),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('writer')
                ->required()
                ->live(onBlur: true),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->disk('public') 
                ->directory('images')
                ->required(),

            Forms\Components\Textarea::make('content_news')
                ->required()
                ->rows(6),

            Forms\Components\DateTimePicker::make('published_at')
                ->required(),

            Forms\Components\Toggle::make('is_top_pick')
                ->label('Top Pick')
                ->inline(false),
        ]);
}
public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\ImageColumn::make('image')->circular()->disk('public'),
            Tables\Columns\TextColumn::make('slug'),
            Tables\Columns\TextColumn::make('writer')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('published_at')->dateTime('d M Y H:i'),
            Tables\Columns\IconColumn::make('is_top_pick')->boolean()->label('Top Pick'),
        ])
        ->filters([
            Tables\Filters\TernaryFilter::make('is_top_pick')->label('Top Picks Only'),

        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
    
}
