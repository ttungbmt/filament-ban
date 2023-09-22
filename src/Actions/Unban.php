<?php

namespace FilamentPro\FilamentBan\Actions;

use Closure;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

class Unban extends BulkAction
{
    protected bool | Closure $shouldDeselectRecordsAfterCompletion = true;


    protected string | Closure | null $icon = 'heroicon-o-lock-open';

    public static function make(?string $name = 'unban'): static
    {
        return parent::make($name);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this
            ->requiresConfirmation()
            ->action($this->handle(...));
    }

    protected function handle(Collection $records, array $data): void
    {
        $records->each->unban();

        Notification::make()
            ->title('Models were unbanned!')
            ->success()
            ->send();
    }
}
