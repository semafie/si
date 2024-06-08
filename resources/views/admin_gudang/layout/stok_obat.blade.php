@extends('admin_gudang.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card semua_obat">
        
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama obat</th>
                  <th>harga obat</th>
                  <th>jumlah stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($obat as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->harga_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td class="button_intable" >
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editobat{{ $item->id }}">Edit</button>
                            
                        </td>
                    </tr>
                    
                    <div class="modal fade" id="editobat{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalToggleLabel">Edit Obat</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="/admin_gudang/stok_obat/edit/{{ $item->id }}" method="POST">
                                @csrf
                                @method('put')
                            <div class="modal-body semua_obats">
                                    <label for="defaultFormControlInput" class="form-label">JUmlah stok</label>


                                    <input type="text" name="jumlah_stok" value="{{ $item->jumlah_stok }}" name="jumlah_stok" class="form-control" id="defaultFormControlInput" placeholder="Masukkan jumlah stok" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" >Edit Obat</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
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