
<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <x-mary-form wire:submit="save">

                    <x-mary-select label="Right icon" icon-right="o-user" :options="$users" wire:model="selectedUser" />

                    <x-slot:actions>
                        <x-mary-button label="Cancel" />
                        <x-mary-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
                    </x-slot:actions>
                </x-mary-form>
            </div>
        </div>
    </div>

</div>