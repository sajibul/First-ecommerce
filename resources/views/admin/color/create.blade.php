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
              <h3 class="card-title">
                @if(@$editColor)
                Edit Color
                @else
                Create New Color
                @endif
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                   <!-- Button trigger modal -->
                  <a href="{{route('color.index')}}" class="btn btn-primary">All  Color</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{(@$editColor) ?  route('color.update',$editColor->id) : route('color.store')}}" method="POST">
                @csrf
                @if(!empty(@$editColor))
                @method('PUT')
                @endif
               <div class="form-row">
                 <div class="form-group col-md-12">
                   <label for="color_name">Color Name</label>
                   <input type="hidden" name="id"  class="form-control"  value="{{@$editColor->id}}">
                   <input type="text" name="color_name"  class="form-control"  value="{{@$editColor->name}}">
                 </div>
               </div>
               </div>
               <div class="modal-footer">
                 <button type="submit"   class="btn btn-primary">Submit</button>
               </div>
             </form>
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


@endpush
















  