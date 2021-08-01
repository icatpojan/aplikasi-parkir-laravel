<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Area;
use Livewire\WithPagination;

class Areas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama_tempat, $area_id;
    public $updateMode = false;
    public $paginate = 5;
    public function render()
    {
        $areas = Area::latest()->paginate($this->paginate);
        return view('livewire.area.areas', compact('areas'));
    }
    public function peringatan  ($message)
    {
        $this->alert('success', $message, [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }
    private function resetInputFields()
    {
        $this->nama_tempat = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama_tempat' => 'required',
        ]);
        area::create($validatedDate);

        $this->peringatan('berhasil menambah area');
        $this->resetInputFields();

        $this->emit('areaStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $area = area::where('id', $id)->first();
        $this->area_id = $id;
        $this->nama_tempat = $area->nama_tempat;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nama_tempat' => 'required',
        ]);

        if ($this->area_id) {
            $area = area::find($this->area_id);
            $area->update([
                'nama_tempat' => $this->nama_tempat,
            ]);
            $this->updateMode = false;
            $this->peringatan('berhasil mengupdate area');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        if ($id) {
            area::where('id', $id)->delete();
            $this->peringatan('berhasil menghapus area');
        }
    }
}
