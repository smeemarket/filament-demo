<?php

namespace App\Filament\Resources\Blog\PostResource\Widgets;

use App\Models\Blog\Author;
use App\Models\Blog\Category;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Filament\Resources\Blog\PostResource\Pages\ListPosts;

class PostStats extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListPosts::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Post', $this->getPageTableQuery()->count()),
            Stat::make('Total Category', Category::count()),
            Stat::make('Total Author', Author::count()),
        ];
    }
}
