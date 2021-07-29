<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pemilik</th>
            <th scope="col">Plat</th>
            <th scope="col">Jam masuk</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Customer as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->nama_pemilik }}</td>
                <td><h5><b>{{ $customer->nomer_plat }}</b></h5></td>
                <td>{{ $customer->jam_masuk }}</td>
                <td>{{ $customer->jam_keluar }}</td>
                <td>
                    <form action="{{ route('customer.keluar', $customer->id) }}" method="post">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm mt-1" type="submit">
                            <i class="	fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
