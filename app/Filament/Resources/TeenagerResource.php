<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeenagerResource\Pages;
use App\Filament\Resources\TeenagerResource\RelationManagers;
use App\Models\Teenager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeenagerResource extends Resource
{
    protected static ?string $model = Teenager::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('gender'),
                TextColumn::make('birthdate'),
                TextColumn::make('father_id'),
                TextColumn::make('mother_id'),
                TextColumn::make('supervisor_id'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTeenagers::route('/'),
            'create' => Pages\CreateTeenager::route('/create'),
            'view' => Pages\ViewTeenager::route('/{record}'),
            'edit' => Pages\EditTeenager::route('/{record}/edit'),
        ];
    }
}
