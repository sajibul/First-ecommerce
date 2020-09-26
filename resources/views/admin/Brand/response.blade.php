
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  {{--end data table  --}}
 <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
        <td>ID</td>
        <td>Brand</td>
        <td>Description</td>
        <td>Status</td>
        <td>Created_at</td>
        <td>Action</td>
        </tr>
    </thead>
    <tbody>
      @php
      $i=1;
      @endphp
    @foreach ($brand  as  $item)
    <tr>
    <td>{{$i++}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->description}}</td>
    <td>
      @if($item->status==1)
      <button href="#" title="unpublished" onclick='unpublished("{{$item->id}}")' class=" btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-up"></span></button>
      @else
      <button href="#" title="published" onclick='published("{{$item->id}}")'  class="btn btn-sm btn-danger"><span class="fa fa-arrow-alt-circle-down"></span></button>
    @endif
    </td>
    <td>{{ date("d-m-Y",strtotime($item->created_at))}}</td>
    <td>
      <a title="view"  id="view" href="{{route('brand.show',$item->id)}}" data-id="{{$item->id}}"><i class="btn btn-sm btn-success fa fa-eye"></i></a>
      <a title="edit" id="edit" href="{{route('brand.edit',$item->id)}}" data-id="{{$item->id}}"><i class="btn btn-sm btn-primary fas fa-edit" aria-hidden="true"></i></a>
      <a title="delete"  id="delete" onclick="return confirm('Are sure to delete this ?')"  href="{{route('brand.destroy',$item->id)}}" data-id="{{$item->id}}"><i class="btn btn-sm btn-primary fas fa-delete" aria-hidden="true">delete</i></a>
    </td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
    <td>ID</td>
    <td>Brand</td>
    <td>Description</td>
    <td>Status</td>
    <td>Created_at</td>
    <td>Action</td>
    </tr>
    </tfoot>
  </table>