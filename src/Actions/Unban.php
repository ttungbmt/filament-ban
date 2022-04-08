<?php
namespace FilamentPro\FilamentBan\Actions;

use Filament\Http\Livewire\Concerns\CanNotify;
use Filament\Tables\Actions\BulkAction;
use Closure;
use Illuminate\Database\Eloquent\Collection;

class Unban extends BulkAction
{
    use CanNotify;

    protected bool | Closure $shouldDeselectRecordsAfterCompletion = true;

    protected string | Closure | null $icon = 'heroicon-o-lock-open';

    protected function setUp(): void
    {
        $this->action(Closure::fromCallable([$this, 'handle']));
    }

    protected function handle(Collection $records, array $data)
    {
        $records->each->unban();

        $this->notify('success', 'Models were unbanned!');
    }
}
