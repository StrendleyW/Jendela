<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FactCheckArticleResource\Pages;
// use App\Filament\Admin\Resources\FactCheckArticleResource\RelationManagers; // Aktifkan jika perlu
use App\Models\FactCheckArticle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str; // Sudah benar ada
use Filament\Forms\Set;    // Sudah benar ada
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FactCheckArticleResource extends Resource
{
    protected static ?string $model = FactCheckArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check'; // Saya ganti icon agar lebih relevan
    protected static ?string $navigationGroup = 'Konten'; // Contoh grup navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true) // PENTING: Trigger update saat field title kehilangan fokus
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))), // PENTING: Membuat slug

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(FactCheckArticle::class, 'slug', ignoreRecord: true), // PENTING: Pastikan slug unik

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('fact-check-images')
                    ->visibility('public')
                    ->label('Gambar Utama'),

                // Sebaiknya gunakan RichEditor untuk input teks yang panjang dan butuh format
                Forms\Components\RichEditor::make('claim_excerpt')
                    ->label('Ringkasan Klaim')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('full_content')
                    ->label('Isi Lengkap Artikel')
                    ->required()
                    ->columnSpanFull(),

                // Sebaiknya gunakan Select untuk verdict agar pilihan terkontrol
                Forms\Components\Select::make('verdict')
                    ->label('Status Verdict')
                    ->options([
                        'hoax'          => 'Hoax',
                        'fact'          => 'Fakta',
                        'misleading'    => 'Misleading',
                        'clarification' => 'Klarifikasi',
                    ])
                    ->required()
                    ->native(false),

                Forms\Components\TextInput::make('source_name')
                    ->label('Nama Sumber'),
                Forms\Components\TextInput::make('source_link')
                    ->label('Link Sumber')
                    ->url(), // Menambahkan validasi URL

                Forms\Components\DateTimePicker::make('published_at')
                    ->required()
                    ->label('Tanggal Publikasi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(fn (FactCheckArticle $record): string => $record->title),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('verdict')
                    ->searchable()
                    ->sortable()
                    ->badge() // Menampilkan sebagai badge
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'hoax' => 'danger',
                        'fact' => 'success',
                        'misleading' => 'warning',
                        'clarification' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('source_name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), // Mungkin ingin disembunyikan default
                // Menghapus source_link dari tabel default agar tidak terlalu ramai, bisa ditambahkan jika perlu
                // Tables\Columns\TextColumn::make('source_link')->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('verdict') // Filter berdasarkan verdict
                    ->options([
                        'hoax' => 'Hoax',
                        'fact' => 'Fakta',
                        'misleading' => 'Misleading',
                        'clarification' => 'Klarifikasi',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Menambahkan DeleteAction
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc'); // Default urutan
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
            'index' => Pages\ListFactCheckArticles::route('/'),
            'create' => Pages\CreateFactCheckArticle::route('/create'),
            'edit' => Pages\EditFactCheckArticle::route('/{record}/edit'),
        ];
    }
}