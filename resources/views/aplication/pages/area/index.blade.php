@extends('aplication.layouts')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">{{ $title }}</li>
@endsection
@section('css')
    {{-- @include('aplication.css.datatable') --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        @livewire('areas')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Province</label>
                            <select name="province" id="province" class="form-control">
                                <option value="">== Select Province ==</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @error('nama_tempat') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">City</label>
                            <select name="city" id="city" class="form-control">
                                <option value="">== Select City ==</option>
                            </select>
                            @error('nama_tempat') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    {{-- @include('aplication.components.modal.user') --}}
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $(function() {
            $('#province').on('change', function() {
                axios.post('{{ route('dependent-dropdown.store') }}', {
                        id: $(this).val()
                    })
                    .then(function(response) {
                        $('#city').empty();

                        $.each(response.data, function(id, name) {
                            $('#city').append(new Option(name, id))
                        })
                    });
            });
        });
    </script>
    <script type="text/javascript">
        window.livewire.on('areaStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- @include('aplication.script.animasi') --}}
    @include('aplication.script.datatable')
@endsection
