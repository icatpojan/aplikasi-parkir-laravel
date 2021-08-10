<div>
    @include('livewire.area.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@include('livewire.area.create')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('livewire.components.paginate')
            <table class="table table-bordered table-striped sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($areas as $value)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $value->nama_tempat }}</td>
                            <td>
                                <button data-toggle="modal" data-target="#updateModal"
                                    wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click="delete({{ $value->id }})"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $areas->links() }}
            </div>
        </div>
    </div>
</div>

