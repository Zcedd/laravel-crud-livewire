<div>
    <div class="h4">List of Employee</div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
        create
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">email</th>
                <th scope="col">department</th>
                <th scope="col">designation</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <th>{{$employee->name}}</th>
                <td>{{$employee->contact}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->department}}</td>
                <td>{{$employee->designation}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#edit{{$employee->id}}" wire:emit="editId({{$employee->id}})">
                        update
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete{{$employee->id}}">
                        delete
                    </button>
                </td>
            </tr>
            <div class="modal fade" id="edit{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit="update({{$employee->id}})">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="helpId" placeholder="" wire:model.defer='name'>
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="contact"
                                        aria-describedby="helpId" placeholder="" wire:model.defer='contact'>
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                                {{-- <input type="text" class="form-control" wire:model.defer='contact'> --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        aria-describedby="helpId" placeholder="" wire:model.defer='email'>
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                                {{-- <input type="text" class="form-control" wire:model.defer='email'> --}}
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <select class="form-select form-select-lg" name="department" id="department">
                                        <option value="Office of the President">Office of the President</option>
                                        <option value="information technology">information technology</option>
                                        <option value="Human ressources">Human ressources</option>
                                        <option value="quality assurance">quality assurance</option>
                                        <option value="fleet a1">fleet a1</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <select class="form-select form-select-lg" name="designation" id="designation">
                                        <option value="manager">manager</option>
                                        <option value="supervisor">supervisor</option>
                                        <option value="programmer">programmer</option>
                                        <option value="technical assistance">technical assistance</option>
                                        <option value="officer">officer</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="delete{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">delete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="h1">Are you sure to delete employee?</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="delete({{$employee->id}})">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">create</h1> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="add">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                placeholder="" wire:model.defer='name'>
                            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control" name="contact" id="contact"
                                aria-describedby="helpId" placeholder="" wire:model.defer='contact'>
                            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                        </div>
                        {{-- <input type="text" class="form-control" wire:model.defer='contact'> --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId"
                                placeholder="" wire:model.defer='email'>
                            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                        </div>
                        {{-- <input type="text" class="form-control" wire:model.defer='email'> --}}
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select form-select-lg" name="department" id="department"
                                wire:model.defer="department">
                                <option value="Office of the President">Office of the President</option>
                                <option value="information technology">information technology</option>
                                <option value="Human ressources">Human ressources</option>
                                <option value="quality assurance">quality assurance</option>
                                <option value="fleet a1">fleet a1</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <select class="form-select form-select-lg" name="designation" id="designation"
                                wire:model.defer="designation">
                                <option value="manager">manager</option>
                                <option value="supervisor">supervisor</option>
                                <option value="programmer">programmer</option>
                                <option value="technical assistance">technical assistance</option>
                                <option value="officer">officer</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>