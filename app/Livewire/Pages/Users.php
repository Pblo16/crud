<?php

namespace App\Livewire\Pages;

use App\Imports\Userimport;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PersonalData;
use Illuminate\Container\Attributes\Auth;

class Users extends Component
{
    use WithFileUploads;
    use WithPagination;

    public array $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'email', 'label' => 'Email'],
    ];


    public $file;
    public $selectedTab = 'users-tab';
    public $perPage = 5;
    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);

        Excel::import(new Userimport, $this->file->path());

        session()->flash('message', 'Users imported successfully.');
        $this->selectedTab = 'users-tab';
    }


    #[Layout('layouts.app')]
    public function render(): View
    {
        $items = User::paginate($this->perPage);
        return view('livewire.pages.users', [
            'items' => $items,
        ]);
    }
}
