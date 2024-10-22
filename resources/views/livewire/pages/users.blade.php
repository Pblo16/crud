{{-- You can use any `$wire.METHOD` on `@row-click` --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-mary-tabs wire:model="selectedTab" active-class="bg-primary rounded text-white" label-class="font-semibold"
            label-div-class="bg-primary/5 p-2 rounded">
            <x-mary-tab name="users-tab" label="Users">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <x-mary-table :headers="$headers" :rows="$users" striped no-hover />
                </div>
            </x-mary-tab>
            <x-mary-tab name="update-tab" label="Update">
                <x-mary-form wire:submit="import">

                    <x-mary-file wire:model="file" label="file" accept="application/xlsx, application/csv" />

                    @error('file')
                    <span class="error">{{ $message }}</span>
                    @enderror
                    <x-slot:actions>
                        <x-mary-button label="Update" class="btn-primary" type="submit" spinner="save" />
                    </x-slot:actions>
                </x-mary-form>
            </x-mary-tab>
        </x-mary-tabs>
    </div>
</div>