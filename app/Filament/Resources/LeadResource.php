<?php

namespace App\Filament\Resources;

use App\Enums\TypeLeadEnum;
use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers;
use App\Models\Lead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;


class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $modelLabel = 'empresa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Dados da empresa')
            ->schema([
                Forms\Components\TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->mask('99.999.999/9999-99')
                    ->rule('cnpj')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('social_reason')
                    ->label('Razão Social')
                    ->required()
                    ->maxLength(255),
                ]),
            Section::make('Dados para Contato')
            ->schema([
                Forms\Components\select::make('type')
                    ->label('Tipo de Empresa')
                    ->options(TypeLeadEnum::class)
                    ->required(),
                Forms\Components\TextInput::make('name_manager')
                    ->label('Nome do Responsável')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone')
                    ->label('Telefone/Celular')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('observation')
                    ->label('Observação')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_name')
                    ->label('Parceiro')
                    ->readonly()
                    ->default(Auth::user() ? Auth::user()->name: 'Usuário desconhecido')
                    ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_reason')
                    ->label('Razão Social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo de Empresa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_manager')
                    ->label('Nome do Responsável')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->label('Telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('observation')
                    ->label('Observação')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_name')
                    ->label('Nome do Responsável')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
