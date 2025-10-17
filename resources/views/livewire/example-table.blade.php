<?php

use App\Models\Shop\Product;
use App\Models\User;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Volt\Component;

new class extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithSchemas;
    use InteractsWithTable;

    public function table($table)
    {
        return $table
            ->query(User::query())
            ->columns([
                TextColumn::make('name')
                    ->toggleable()
                ,
                TextColumn::make('email'),
            ])
            ->persistFiltersInSession()
            ->filters([
                SelectFilter::make('email')
                    ->options(
                        User::pluck('email')->toArray()
                    )
            ])
            ->recordActions([
                // ...
            ])
            ->toolbarActions([
                // ...
            ]);
    }
};
?>

<div>
    {{ $this->table }}
</div>

