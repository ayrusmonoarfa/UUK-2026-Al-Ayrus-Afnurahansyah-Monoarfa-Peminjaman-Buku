<?php

namespace App\Filament\Resources\Users\Schemas;


use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('role')
                    ->required()
                    ->default('siswa'),
                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation) => $operation === 'create'),
                TextInput::make('kelas')
                    ->default(null),
                DateTimePicker::make('email_verified_at'),
            ]);
    }
}
