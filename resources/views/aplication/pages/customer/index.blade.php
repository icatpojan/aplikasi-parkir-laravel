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
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('customer.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Email address</label> --}}
                                        <input type="text" name="nomer_plat" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" autofocus>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <form action="{{ route('customer.geting') }}" method="GET">
                                    {{-- @csrf --}}
                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Email address</label> --}}
                                        <input type="text" name="nomer_plat" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" autofocus>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @include('aplication.components.table.customer')
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    @include('aplication.components.modal.user')
@endsection

@section('script')
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- @include('aplication.script.animasi') --}}
    {{-- @include('aplication.script.datatable') --}}
@endsection
