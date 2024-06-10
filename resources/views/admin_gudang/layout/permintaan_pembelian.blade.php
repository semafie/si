@extends('admin_gudang.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <ul class="nav nav-pills mb-3" role="tablist">
    <li class="nav-item">
        <button type="button" class="nav-link active btn-formaa" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
            aria-selected="true">Obat</button>
    </li>
    <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
            aria-selected="false">Bahan Habis Pakai</button>
    </li>
    <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages"
            aria-selected="false">Alat Kesehatan</button>
    </li>
</ul>
    <div class="card">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
          
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
                @foreach($pembelianobat as $item)
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
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
          
          <div class="text-nowrap table-responsive pt-0">
            <table id="myTable1" class="datatables-basic table border-top w-100">
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
                @foreach($pembelianbahan as $item)
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
        <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
         
          <div class="text-nowrap table-responsive pt-0">
            <table id="myTable2" class="datatables-basic table border-top w-100">
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
                @foreach($pembelianalat as $item)
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
      
        

    </div>
</div>

<script>
    let table = new DataTable('#myTable');
    let table1 = new DataTable('#myTable1');
    let table2 = new DataTable('#myTable2');
</script>
@endsection