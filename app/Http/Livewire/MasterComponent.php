<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Master;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateMasterRequest;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ChildController;

class MasterComponent extends Component
{    
    // properties
    public $masterId;    
    public $master;    
    public $children = null;
    public $updateMasterFormCash = 0;
    public $storeChildFormName = '';
    public $storeChildFormCash = 0;
    public $setCashModalVisible;
    public $storeChildModalVisible;

    // listeners
    protected $listeners = [
        'childDeleted' => 'loadRecords',
        'askForCash' => 'checkAvailableCash'
    ];
    
    // lifecycle hooks
    public function mount($id)
    {
        $this->masterId = $id;

        $this->loadRecords();

        $this->updateMasterFormCash = $this->master->cash;
    }

    public function render()
    {
        return view('livewire.master-component');
    }

    // controller methods
    public function loadRecords()
    {
        $this->master = Master::findOrFail($this->masterId);
    
        $this->children = $this->master->children;
    }

    public function checkAvailableCash($childId, $amount)
    {
        if($this->master->cash < $amount)
        {
            return;
        }

        $this->master->cash -= $amount;
        
        $updateMasterRequest = new UpdateMasterRequest([
            'name' => $this->master->name,
            'cash' => $this->master->cash
        ]);

        $masterController = new MasterController();
        
        $masterController->update($updateMasterRequest, $this->master);

        $this->emitTo('child-component', 'giveCash', $childId, $amount);

        $this->loadRecords();
    }

    public function showSetCashModal()
    {
        $this->setCashModalVisible = true;
    }

    public function hideSetCashModal()
    {
        $this->setCashModalVisible = false;
    }

    public function showStoreChildModal()
    {
        $this->storeChildModalVisible = true;
    }

    public function hideStoreChildModal()
    {
        $this->storeChildModalVisible = false;
    }

    public function store()
    {
        $storeChildRequest = new StoreChildRequest([
            'name' => $this->storeChildFormName,
            'master_id' => $this->master->id,
            'cash' => $this->storeChildFormCash,
        ]);

        $childController = new ChildController();
        
        $childController->store($storeChildRequest);

        $this->loadRecords();

        $this->hideStoreChildModal();
    }

    public function update()
    {
        $updateMasterRequest = new UpdateMasterRequest([
            'name' => $this->master->name,
            'cash' => $this->updateMasterFormCash
        ]);

        $masterController = new MasterController();
        
        $masterController->update($updateMasterRequest, $this->master);

        $this->loadRecords();

        $this->hideSetCashModal();
    }

    public function destroy()
    {
        $masterController = new MasterController();
        
        $masterController->destroy($this->master);

        $this->emitUp('masterDeleted');
    }
}
