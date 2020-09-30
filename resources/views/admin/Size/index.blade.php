@extends('layouts.admin')
@section('content')
@section('tittle','Color Management')
@push('css')
<style type="text/css">
  .load{
      position: fixed;
      left: 50%;
      text-align: center;
      top: 20%;
      z-index: 9999;
      margin: auto;
      display: none;
  }
  .load img{
    margin: auto;
    text-align: center;
  }
</style>
@endpush
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Color</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                   <!-- Button trigger modal -->
                  <a href="{{route('color.create')}}" class="btn btn-primary"> Add New Color</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Brand</td>
                    {{-- <td>Status</td> --}}
                    <td>Created_at</td>
                    <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                @foreach ($color  as  $item)
                <tr>
                <td>{{$i++}}</td>
                <td>{{$item->name}}</td>
                <td>{{ date("d-m-Y",strtotime($item->created_at))}}</td>
                <td>
                  <a title="view"  id="view" href="{{route('product-size.show',$item->id)}}" data-id="{{$item->id}}"><i class="btn btn-sm btn-success fa fa-eye"></i></a>
                  <a title="edit" id="edit" href="{{route('product-size.edit',$item->id)}}" data-id="{{$item->id}}"><i class="btn btn-sm btn-primary fas fa-edit" aria-hidden="true"></i></a>
                  {{-- <a title="delete"  id="delete" onclick="return confirm('Are sure to delete this ?')"  href="" data-id="{{$item->id}}"></a> --}}
                  <button type="button" class="btn btn-sm btn-danger" name="button" onclick="Size({{$item->id}})"><i class="fa fa-trash fa-lg"></i></button>
                    <form id="product-size-{{$item->id}}" action="{{route('product-size.destroy',$item->id)}}" method="post">
                      @csrf
                      @method('Delete')
                    </form>
                </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <td>ID</td>
                <td>Brand</td>
                {{-- <td>Status</td> --}}
                <td>Created_at</td>
                <td>Action</td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
@push('js') 

<script type="text/javascript">
  function Size(id) {
    const swalWithBootstrapButtons = Swal.mixin({
customClass: {
confirmButton: 'btn btn-success',
cancelButton: 'btn btn-danger'
},
buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
type: 'warning',
showCancelButton: true,
confirmButtonText: 'Yes, delete it!',
cancelButtonText: 'No, cancel!',
reverseButtons: true
}).then((result) => {
if (result.value) {
event.preventDefault();
document.getElementById('product-size-'+id).submit();
} else if (
// Read more about handling dismissals
result.dismiss === Swal.DismissReason.cancel
) {
swalWithBootstrapButtons.fire(
'Cancelled',
'Your imaginary file is safe :)',
'error'
)
}
})
  }
</script>

@endpush