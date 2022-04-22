<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\MasterController;
use App\Http\Requests\StoreMasterRequest;
use App\Models\Master;

class ContainerComponent extends Component
{
    // properties
    public $storeMasterModalVisible = false;
    public $masters = null;
    public $storeMasterFormName = '';
    public $storeMasterFormCash = 0;

    // listeners
    protected $listeners = ['masterDeleted' => 'loadRecords'];

    // lifecycle hooks
    public function mount() {
        $this->loadRecords();
    }

    public function render()
    {
        return view('livewire.container-component');
    }

    // controller methods
    public function loadRecords()
    {
        $this->masters = Master::all();
    }

    public function showStoreMasterModal()
    {
        $this->storeMasterModalVisible = true;
    }

    public function hideStoreMasterModal()
    {
        $this->storeMasterModalVisible = false;
    }

    public function store()
    {
        $storeMasterRequest = new StoreMasterRequest([
            'name' => $this->storeMasterFormName,
            'cash' => $this->storeMasterFormCash,
        ]);

        $masterController = new MasterController();
        
        $masterController->store($storeMasterRequest);

        $this->loadRecords();

        $this->hideStoreMasterModal();
    }
}
