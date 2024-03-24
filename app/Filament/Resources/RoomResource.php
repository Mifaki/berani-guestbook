<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use App\Models\TimeSlot;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'Rooms';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true),

                                TextInput::make('capacity')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0)
                                    ->live(onBlur: true),

                                MarkdownEditor::make('description')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->columnSpan('full')
                            ])->columns(2),
                        Section::make()
                            ->schema([
                                Select::make('timeSlots.start_time')
                                    ->multiple()
                                    ->relationship('timeSlots', 'start_time')
                                    ->options(TimeSlot::pluck('start_time', 'id'))
                                    ->helperText('
                                    09:00:00 AM - 12:00:00 PM ||
                                    13:00:00 PM - 16:00:00 PM ||
                                    16:00:00 PM  17:00:00 PM ||
                                    '),

                                FileUpload::make('image')
                                    ->directory('form-attachments')
                                    ->preserveFilenames()
                                    ->image()
                                    ->imageEditor()
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('capacity')
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable(),
                TagsColumn::make('timeSlots.start_time')
                    ->label('Start Time')
                    ->dateTime(),
                TagsColumn::make('timeSlots.end_time')
                    ->label('End Time')
                    ->dateTime()
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
