@extends('layouts.admin')
@section('content')
@section('tittle','SubCategory Management')
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
              <h3 class="card-title">All SubCategory</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                   <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subcategoryModal">
                    Add New SubCategory
                  </button>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="subcategoryList">
                @include('admin.subcategory.response')
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          @include('admin.subcategory.create');
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
    //insert data with ajax 
      $("#addsubcategoryForm").on("submit",function(e){
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

              beforeSend:function(){
                $(".load").fadeIn();
              },
              success:function(data){
                $("#subcategoryModal").modal('hide');
                form[0].reset();
              $.get("{{route('allsubcategory')}}",function(data){
                $("#subcategoryList").empty().html(data);
                Swal.fire('Good job!','SubCategory Created!','success');
            });
              },
              complete:function(){
                $(".load").fadeOut();
              }
          });
      });
//edit data subcategory 

      $(document).on("click","#edit",function(e){
          e.preventDefault();
          var id = $(this).data("id");
          var url = $(this).attr("href");

          $.ajax({
              url:url,
              data:{id:id},
              type:"GET",
              dataType:"JSON",
              success:function(response){
                $("#UpdateSubcategoryModal").modal('show');
                $("#id").val(response.id);
                $("#subcategory_name").val(response.subcategory_name);
                $("#categoryes_name").val(response.category_id);
                $("#sub_description").val(response.description);

              }
          });
      });

      //update subcategory data 
        $("#UpdatesubCategoryForm").on("submit",function(e){
            e.preventDefault();
            var form = $(this);
            var url = form.attr("action");
            var type = form.attr("method");
            var data = form.serialize();
            // console.log(url);
            $.ajax({
                url: url,
                data:data,
                type:type,
                dataType:"JSON",
                beforeSend:function(){
                  $(".load").fadeIn();
                },
                success:function(data){
                  $("#UpdateSubcategoryModal").modal('hide');
                  $.get("{{route('allsubcategory')}}",function(data){
                $("#subcategoryList").empty().html(data);
                Swal.fire('Good job!','SubCategory Update!','success');
            });
                },
                complete:function(){
                  $(".load").fadeOut();
                },
            });
        });


        //delete subcategory
        $(document).on("click","#delete",function(e){
          e.preventDefault();
          var id = $(this).data("id");
          var url = $(this).attr("href");

          $.ajax({
            url:url,
            data:{id:id},
            type:"GET",
            dataType:"JSON",

            success:function(response){
              $.get("{{route('allsubcategory')}}",function(data){
                $("#subcategoryList").empty().html(data);
                Swal.fire('Good job!','SubCategory delete!','success');
            });

            },


          });

        });
        //end delete subcategory
  })
</script>

  {{-- unpublished status --}}
  <script type="text/javascript">
    function unpublished(id){
      var check = confirm("If you want to unpublished this subcategory , press ok");
      if(check){
        $.get("{{route('subcategory-unpublished')}}",{id},function(data){
          $.get("{{route('allsubcategory')}}",function(data){
                $("#subcategoryList").empty().html(data);
                Swal.fire('Good job!','SubCategory unpublished!','success');
            });
        });
      }
    } 
  </script>
  {{-- published status --}}
  <script type="text/javascript">
    function published(id){
      var check = confirm("If you want to unpublished this subcategory , press ok");
      if(check){
        $.get("{{route('subcategory-published')}}",{id},function(data){
          $.get("{{route('allsubcategory')}}",function(data){
                $("#subcategoryList").empty().html(data);
                Swal.fire('Good job!','SubCategory published!','success');
            });
        });
      }
    } 
  </script>

@endpush