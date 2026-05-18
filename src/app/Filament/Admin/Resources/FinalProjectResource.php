<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FinalProjectResource\Pages;
use App\Models\FinalProject;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

use Filament\Forms;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class FinalProjectResource extends Resource
{
    protected static ?string $model = FinalProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Final Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('title')
                    ->label('Judul')
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->rows(4),

                Textarea::make('problem')
                    ->label('Analisis Masalah')
                    ->rows(4),

                Textarea::make('main_feature')
                    ->label('Fitur Utama')
                    ->helperText('Pisahkan dengan koma'),

                TextInput::make('tech_stack')
                    ->label('Tech Stack')
                    ->helperText('Contoh: Laravel, Filament v3, MariaDB'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Planning' => 'Planning',
                        'Sedang Dikerjakan' => 'Sedang Dikerjakan',
                        'Selesai' => 'Selesai',
                        'On Hold' => 'On Hold',
                    ])
                    ->required(),

                TextInput::make('progress')
                    ->label('Progress (%)')
                    ->numeric()
                    ->default(0),

                FileUpload::make('erd_image')
                    ->label('ERD Image')
                    ->image()
                    ->directory('erd'),

                TextInput::make('year')
                    ->label('Tahun')
                    ->numeric(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->searchable(),

                TextColumn::make('status'),

                TextColumn::make('progress')
                    ->suffix('%'),

                TextColumn::make('year'),

            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [

            'index' => Pages\ListFinalProjects::route('/'),

            'create' => Pages\CreateFinalProject::route('/create'),

            'edit' => Pages\EditFinalProject::route('/{record}/edit'),

        ];
    }
}