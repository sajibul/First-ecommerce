<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Sl.</th>
      <th>Category Name</th>
      <th>Status</th>
      <th>created_at</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
      @php
      $i=1;
      @endphp
      @foreach($categories as $data)
    <tr>
      <td>{{$i++}}</td>
      <td>{{$data->name}}</td>
      <td>
        @if($data->status==1)
        <button href="#" title="unpublished" onclick='unpublished("{{$data->id}}")' class="btn btn-sm btn-danger"><span class="fa fa-arrow-alt-circle-up"></span></button>
        @else
        <button href="#" title="published" onclick='published("{{$data->id}}")'  class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-down"></span></button>
      @endif
      </td>
      <td>{{ date("d-m-Y",strtotime($data->created_at))}}</td>
      <td>
      <a title="view"  id="view" href="{{route('category.show',$data->id)}}" data-id="{{$data->id}}"><i class="btn btn-sm btn-success fa fa-eye"></i></a>
      <a title="edit" id="edit" href="{{route('category.edit',$data->id)}}" data-id="{{$data->id}}"><i class="btn btn-sm btn-primary fas fa-edit" aria-hidden="true"></i></a>
      <a title="delete"  id="delete" onclick="return confirm('Are sure to delete this ?')"  href="{{route('category.destroy',$data->id)}}" data-id="{{$data->id}}"><i class="btn btn-sm btn-primary fas fa-delete" aria-hidden="true">delete</i></a>
      </td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>Sl.</th>
      <th>Category Name</th>
      <th>Status</th>
      <th>created_at</th>
      <th>Action</th>
    </tr>
    </tfoot>
  </table>
  
  