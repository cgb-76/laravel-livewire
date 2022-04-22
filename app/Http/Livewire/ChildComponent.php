<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Child;
use App\Http\Controllers\ChildController;
use App\Http\Requests\UpdateChildRequest;

class ChildComponent extends Component
{
    // properties
    public $childId;
    public $child;
    public $ask10ButtonDisabled = false;
    public $ask20ButtonDisabled = false;
    public $ask30ButtonDisabled = false;

    // listeners
    protected $listeners = [
        'giveCash' => 'receiveCash'
    ];

    // lifecycle hooks
    public function mount($id)
    {
        $this->childId = $id;

        $this->loadRecords();
    }

    public function render()
    {
        return view('livewire.child-component');
    }

    // controller methods
    public function loadRecords()
    {
        $this->child = Child::findOrFail($this->childId);

        $this->ask10ButtonDisabled = $this->child->master->cash < 10;
        $this->ask20ButtonDisabled = $this->child->master->cash < 20;
        $this->ask30ButtonDisabled = $this->child->master->cash < 30;
    }

    public function receiveCash($childId, $amount)
    {
        if($this->childId !== $childId)
        {
            return;
        }

        $this->child->cash += $amount;
        
        $updateChildRequest = new UpdateChildRequest([
            'name' => $this->child->name,
            'master_id' => $this->child->master_id,
            'cash' => $this->child->cash
        ]);

        $childController = new ChildController();
        
        $childController->update($updateChildRequest, $this->child);

        $this->loadRecords();
    }

    public function destroy()
    {
        $childController = new ChildController();
        
        $childController->destroy($this->child);

        $this->emitUp('childDeleted');
    }
}
