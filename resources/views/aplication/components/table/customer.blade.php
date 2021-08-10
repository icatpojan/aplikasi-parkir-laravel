<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pemilik</th>
            <th scope="col">Plat</th>
            <th scope="col">Code</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Keluar</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Customer as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->nama_pemilik }}</td>
                <td>
                    <h5><b>{{ $customer->nomer_plat }}</b></h5>
                </td>
                <td>{!! QrCode::size(80)->generate($customer->nomer_plat) !!}</td>
                <td>{{ $customer->jam_masuk }}</td>
                <td>{{ $customer->jam_keluar }}</td>
                <td>
                    <div class="row">
                        <form action="{{ route('customer.keluar', $customer->id) }}" method="post">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm mr-1" type="submit">
                                <i class="	fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                        <form action="{{ route('customer.print', $customer->id) }}" method="post">
                            @csrf
                            <button class="btn btn-outline-primary btn-sm" type="submit">
                                <i class="	fas fa-print"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
