<?php

namespace FilamentPro\FilamentBan\Actions;

use Closure;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

class Ban extends BulkAction
{
    protected bool | Closure $shouldDeselectRecordsAfterCompletion = true;

    protected string | Closure | null $icon = 'heroicon-o-lock-closed';

    protected function setUp(): void
    {
        $this->modalWidth = 'sm';
        $this->action(Closure::fromCallable([$this, 'handle']));
    }

    protected function handle(Collection $records, array $data): void
    {
        $records->each->ban([
            'comment' => $data['comment'],
            'expired_at' => $data['expired_at'],
        ]);

        Notification::make()
            ->title('Models were banned!')
            ->success()
            ->send();
    }

    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('comment'),

            Forms\Components\DateTimePicker::make('expired_at')->label(__('Expires At')),
        ];
    }
}
