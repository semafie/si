@extends('admin_kepala.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    
   
        <!-- </div>
<div class="row"> -->
        
    <!-- Order Statistics -->
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
      <div class="card h-100">
        <div class="text-nowrap table-responsive pt-0">
          <table id="myTable" class="datatables-basic table border-top">
            <thead>
              <tr>
                <th>id</th>
                <th>nama obat</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $obat as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->nama_obat }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/ Order Statistics -->

    <!-- Expense Overview -->
    <div class="col-md-6 col-lg-4 order-1 mb-4">
      <div class="card h-100">
        <div class="text-nowrap table-responsive pt-0">
          <table id="myTable" class="datatables-basic table border-top">
            <thead>
              <tr>
                <th>id</th>
                <th>nama bahan</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $bahan as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->nama_obat }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/ Expense Overview -->

    <!-- Transactions -->
    <div class="col-md-6 col-lg-4 order-2 mb-4">
      <div class="card h-100">
        <div class="text-nowrap table-responsive pt-0">
          <table id="myTable" class="datatables-basic table border-top">
            <thead>
              <tr>
                <th>id</th>
                <th>nama alat</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $alat as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->nama_obat }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/ Transactions -->
  </div>
</div>
@endsection