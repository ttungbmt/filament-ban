<?php
namespace FilamentPro\FilamentBan\Actions;

use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Http\Livewire\Concerns\CanNotify;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms\Components\DateTimePicker;

class Ban extends BulkAction
{
    use CanNotify;

    protected bool | Closure $shouldDeselectRecordsAfterCompletion = true;

    protected string | Closure | null $icon = 'heroicon-o-lock-closed';

    protected function setUp(): void
    {
        $this->modalWidth = 'sm';
        $this->action(Closure::fromCallable([$this, 'handle']));
    }

    protected function handle(Collection $records, array $data)
    {
        $records->each->ban([
            'comment' => $data['comment'],
            'expired_at' => $data['expired_at'],
        ]);

        $this->notify('success', 'Models were banned!');
    }

    public function getFormSchema(): array
    {
        return [
            TextInput::make('comment'),

            DateTimePicker::make('expired_at')->label(__('Expires At')),
        ];
    }


}
