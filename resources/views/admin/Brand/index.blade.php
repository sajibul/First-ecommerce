@extends('layouts.admin')
@section('content')
@section('tittle','Brand Management')
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
              <h3 class="card-title">All Brand</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                   <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brandModal">
                    Add New Brand
                  </button>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="brandList">
                @include('admin.Brand.response')
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          @include('admin.Brand.create');
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="load">
        <img src="{{asset('backend')}}/4V0b.gif" class="img-fluid loading" alt="">
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
@push('js') 
<script>
$(function(){

    $("#addbrandForm").on("submit" , function(e){
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType: "JSON",
            beforeSend: function(){
                $(".load").fadeIn();
            },
            success: function(){
                $("#brandModal").modal('hide');
                form[0].reset();
                $.get("{{route('allBrand')}}",function(data){
              $("#brandList").empty().html(data);
              Swal.fire('Good job!','Brand Created!','success');
            });
            },
            complete: function(){
                $(".load").fadeOut();
            },
        });
    });

    //edit brand items 

    $(document).on("click", "#edit",function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");

        $.ajax({
            url:url,
            data:{id:id},
            type:"GET",
            dataType:"JSON",
            success:function(response){
              $("#UpdatebrandModal").modal('toggle');
              $("#id").val(response.id);
              $("#brand_name").val(response.name);
              $("#brand_description").val(response.description);

            }
        });
        
    });

    //update brnad 
    $("#updatebrandForm").on("submit",function(e){
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();

        console.log(url);

        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType:"JSON",
            beforeSend:function(){
                $(".load").fadeIn();
            },
            success:function(){
                $("#UpdatebrandModal").modal('hide');
                $.get("{{route('allBrand')}}",function(data){
              $("#brandList").empty().html(data);
              Swal.fire('Good job!','Brand Update!','success');
            });
            },
            complete:function(){
                $(".load").fadeOut();
            },
        });

    });

    //delete brand 
    $(document).on("click","#delete", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");

        // console.log(url);
        // console.log(id);

        $.ajax({
            url:url,
            data:{id:id},
            type:"GET",
            dataType:"JSON",
            success:function(response){
                $.get("{{route('allBrand')}}",function(data){
              $("#brandList").empty().html(data);
              Swal.fire('Good job!','Brand Update!','success');
            });
            },
        });
    });

})

</script>

{{-- unpublished --}}
<script>
    function unpublished(id){
        var check = confirm("If you want to unpublished this brand , press ok");
        if(check){
            $.get("{{route('brand-unpublished')}}",{id},function(data){
                $.get("{{route('allBrand')}}",function(data){
              $("#brandList").empty().html(data);
              Swal.fire('Good job!','Brand unpublished!','success');
            });
            });
        }
    }
</script>
{{-- published --}}
<script>
    function published(id){
        var check = confirm("If you want to published this brand , press ok");
        if(check){
            $.get("{{route('brand-published')}}",{id},function(data){
                $.get("{{route('allBrand')}}",function(data){
              $("#brandList").empty().html(data);
              Swal.fire('Good job!','Brand published!','success');
            });
            });
        }
    }
</script>
@endpush