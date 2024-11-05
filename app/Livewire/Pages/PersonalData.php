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

    public array $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'email', 'label' => 'Email'],
        ['key' => 'phone', 'label' => 'Phone'],
    ];
    public $name;
    public $phone;
    public $email;

    public $file;
    public $selectedTab = 'update-tab';
    public $perPage = 5;
    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);

        Excel::import(new DynamicImport, $this->file->path());

        session()->flash('message', 'Users Data imported successfully.');
        $this->selectedTab = 'users-tab';
    }
    #[Layout('layouts.app')]
    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $personal = new ModelsPersonalData();
        $personal->name = $this->name;
        $personal->phone = $this->phone;
        $personal->email = $this->email;
        $personal->save();

        $this->reset(['name', 'phone', 'email']);
        $this->selectedTab = 'users-tab';
        session()->flash('message', 'Data saved successfully.');
    }
    public function render()
    {
        $items = ModelsPersonalData::paginate($this->perPage);
        return view('livewire.pages.personal-data', [
            'items' => $items,
        ]);
    }
}
