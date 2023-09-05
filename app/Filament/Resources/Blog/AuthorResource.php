<?php

namespace App\Filament\Resources\Blog;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Blog\Author;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkAction;
use Filament\Notifications\Notification;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\BulkActionGroup;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\Blog\AuthorResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $slug = 'blog/authors';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email address')
                    ->required()
                    ->email()
                    ->unique(Author::class, 'email', ignoreRecord: true),

                Forms\Components\MarkdownEditor::make('bio')
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('github_handle')
                    ->label('GitHub'),

                Forms\Components\TextInput::make('twitter_handle')
                    ->label('Twitter'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->searchable()
                            ->sortable()
                            ->weight('medium')
                            ->alignLeft(),

                        Tables\Columns\TextColumn::make('email')
                            ->label('Email address')
                            ->searchable()
                            ->sortable()
                            ->color('gray')
                            ->alignLeft(),
                    ])->space(),

                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('github_handle')
                            ->icon('icon-github')
                            ->label('GitHub')
                            ->alignLeft(),

                        Tables\Columns\TextColumn::make('twitter_handle')
                            ->icon('icon-twitter')
                            ->label('Twitter')
                            ->alignLeft(),
                    ])->space(2),
                ])->from('md'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {
                            $records->each->delete();
                            Notification::make()
                                ->title('Deleted Successfully!')
                                ->success()
                                ->send();
                        }),
                ]),
                ExportBulkAction::make()
            ]);
    }

    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
    //             TextEntry::make('name'),
    //             TextEntry::make('email'),
    //             TextEntry::make('bio'),
    //             TextEntry::make('github_handle'),
    //             TextEntry::make('twitter_handle'),
    //         ])
    //         ->columns(1)
    //         ->inlineLabel();
    // }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAuthors::route('/'),
        ];
    }

    // public static function getNavigationBadge(): ?string
    // {
    //     return static::$model::count();
    // }
}
