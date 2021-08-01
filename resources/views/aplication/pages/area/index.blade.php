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
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    {{-- @include('aplication.components.modal.user') --}}
@endsection

@section('script')
    <script type="text/javascript">
        window.livewire.on('areaStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- @include('aplication.script.animasi') --}}
    @include('aplication.script.datatable')
@endsection
