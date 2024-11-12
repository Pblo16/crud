<?php

namespace App\Livewire\Pages;

use App\Imports\DynamicImport;
use App\Imports\PersonalsImport;
use App\Models\PersonalData as ModelsPersonalData;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class PersonalData extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $file;
    public $selectedTab = 'update-tab';
    public $perPage = 5;

    public array $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'value', 'label' => 'Name'],
    ];

    #[Layout('layouts.app')]
    public function render()
    {
        $items = ModelsPersonalData::paginate($this->perPage);
        return view('livewire.pages.personal-data', [
            'items' => $items,
        ]);
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);

        Excel::import(new DynamicImport, $this->file->path());

        session()->flash('message', 'Users Data imported successfully.');
        $this->selectedTab = 'users-tab';
    }
}
