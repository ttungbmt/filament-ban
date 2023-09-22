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

    protected string | Closure | null $modalWidth = 'sm';
    
    public static function make(?string $name = 'ban'): static
    {
        return parent::make($name);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->action($this->handle(...))
            ->form($this->getFormSchema())
        ;
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

            Forms\Components\DateTimePicker::make('expired_at')
                ->minDate(now())
                ->label(__('Expires At')),
        ];
    }
}
