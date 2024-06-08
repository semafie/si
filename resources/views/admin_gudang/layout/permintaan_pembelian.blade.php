@extends('admin_gudang.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card permintaan">
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>tanggal</th>
                  <th>jam</th>
                  <th>total_harga</th>
                  <th>status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pembelian as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->total_harga }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <form action="/verifikasipermintaan/{{ $item->id }}" method="POST">
                            @csrf
                            @method('put')
                        <button  type="submit" class="btn btn-primary detailbtn">Verifikasi</button>
                    </form>
                    </td>
                </tr>

                
                @endforeach
              </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    let table = new DataTable('#myTable');
</script>
@endsection