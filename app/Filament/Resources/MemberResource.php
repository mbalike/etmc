<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make(('first_name'))->required(),
                TextInput::make(('last_name'))->required(),
                TextInput::make(('email'))->required(),
                TextInput::make(('phone'))->required(),
                Select::make('gender')->label('Gender')->options([
                    'male'   => 'Male',
                    'female' => 'Female',
                ]),
                Select::make('marital_status')->label('Marital Status')->options([
                    'single'   => 'Single',
                    'married' => 'Married',
                    'widowed' => 'Widowed',
                ]),
                DatePicker::make('birthdate')->label('Birthdate')->required(),
                TextInput::make(('spouse_id')),
                TextInput::make(('family_id')),
                TextInput::make(('supervisor_id'))->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make(('id')),
                TextColumn::make(('first_name')),
                TextColumn::make(('last_name')),
                TextColumn::make(('email')),
                TextColumn::make(('phone')),
                TextColumn::make(('birthdate')),
                TextColumn::make(('gender')),
                TextColumn::make(('marital_status')),
                TextColumn::make(('spouse_id')),
                TextColumn::make(('family_id')),
                TextColumn::make(('supervisor_id')),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'view' => Pages\ViewMember::route('/{record}'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
