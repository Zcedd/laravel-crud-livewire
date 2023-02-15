<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\employee;

class Welcome extends Component
{
    public $editId;
    public $name, $contact, $email, $department, $designation;

    public $listen = ['editId'];

    public function editId($id){
        $this->editId = $id;
        $employee = employee::where('id', $id)->first();
        $this->name = $employee->name;
        $this->contact = $employee->contact;
        $this->department = $employee->email;
        $this->department = $employee->department;
        $this->designation = $employee->designation;
        $employee->save();
    }

    public function deleteId($id){
        $this->deleteId = $id;
    }

    public function add(){
        $employee = new employee;
        $employee->name = $this->name;
        $employee->contact = $this->contact;
        $employee->email = $this->email;
        $employee->department = $this->department;
        $employee->designation = $this->designation;
        $employee->save();
    }

    public function update($id){
        $employee = employee::where('id', $id)->first();
        $employee->name = $this->name;
        $employee->contact = $this->contact;
        $employee->email = $this->email;
        $employee->department = $this->department;
        $employee->designation = $this->designation;
        $employee->save();
    }

    public function delete($id){
        $employee = employee::where('id', $id)->first();
        $employee->delete();
    }

    public function render()
    {
        $employees = employee::all();
        return view('livewire.welcome', compact('employees'));
    }
}
