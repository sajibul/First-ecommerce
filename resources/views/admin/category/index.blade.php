@extends('layouts.admin')

@section('content')
@section('tittle','Category Management')
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
<!--start index-->
<section class="content">
  <div class="container-fluid">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fa fa-th"></i>
              All Category List
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                 <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                  Add New Category
                </button>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="card">
              @if(Session::get('success'))
              <div class="alert alert-info btn-btn-success alert-dismissible fade show" role="alert">
                  <strong>Message:</strong>{{Session::get('success')}}
                  <button type="button" class="close" name="button" data-dismiss="alert" aria-label="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif
              <input type="text" id="searchInput" name="category" class="form-control" placeholder="Search category data">
              <div class="card-body" id="categoryList">

                @include('admin/category/allCategory')

              </div>
              {{$categories->links()}}
            </div>
            @include('admin.category.create')
          </div><!-- /.card-body -->
        </div>
      </section>
    </div>
  </div><!-- /.container-fluid -->
  {{-- pagination link  --}}
  <div id="getDatabypagination" data-url="{{route('category-pagination')}}"></div>
  <div class="load">
    <img src="{{asset('backend')}}/4V0b.gif" class="img-fluid loading" alt="">
  </div>
</section>
@endsection
@push('js')


<script>
    $(function() {
      // Data insert with Ajax

      $("#addCategoryForm").on("submit", function(e) {
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
          dataType: "JSON",
          beforeSend: function() {
            $(".load").fadeIn();
          },

          success: function (data) {
            $("#categoryModal").modal('hide');
            form[0].reset();
            $.get("{{route('allcategory')}}",function(data){
              $("#categoryList").empty().html(data);
              Swal.fire('Good job!','Category Created!','success');
            });
				},
            complete:function(){
              $(".load").fadeOut();
            },
        });
      //  console.log(url + "__" + type);
      });







        //edit category with Ajax
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
              $("#UpdatecategoryModal").modal('toggle');
              $("#category").val(response.name);
              $("#id").val(response.id);
              $("#UpdatecategoryModalLabel").text("Update " + response.name + " Category");
            }
          });
          console.log(id + "..." + url);
        });


    //update category with ajax

    $("#UpdateCategoryForm").on("submit", function(e) {
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
          dataType: "JSON",
          beforeSend: function() {
            $(".load").fadeIn();
          },

          success: function (data) {
            $("#UpdatecategoryModal").modal('hide');
            $.get("{{route('allcategory')}}",function(data){
              $("#categoryList").empty().html(data);
              Swal.fire('Good job!','Category Update!','success');
            });
				},
            complete:function(){
              $(".load").fadeOut();
            },
        });
      //  console.log(url + "__" + type);
      });




      //view category by ajax

        $(document).on("click","#view",function(e){
          e.preventDefault();
          var id = $(this).data("id");
          var url = $(this).attr("href");

          $.ajax({
            url:url,
            data:{id:id},
            type:"GET",
            dataType:"JSON",
            success:function(response){
              $("#viewCategory").modal('toggle');
              $(".category").text("Name :  " + response.name);
              // console.log(response);
            }
          });
          console.log(id + "..." + url);
        });



         //delete data with ajax
         $(document).on("click","#delete",function(e){
          e.preventDefault();
          var id = $(this).data("id");
          var url = $(this).attr("href");

          $.ajax({
              url: url,
              data:{id:id},
              type:"GET",
              dataType:"JSON",
              success:function(response){
                $.get("{{route('allcategory')}}",function(response){
              $("#categoryList").empty().html(response);
              Swal.fire('Good job!','Category Delete!','success');
            });
                // console.log(response);
              },
          });
          // console.log(id + "..." + url);

      });

    });





//pagination with ajax 

$(document).on("click",".page-link",function(e){
  e.preventDefault();
  var page = $(this).attr("href");
  
  var pagenumber = page.split("?page=")[1];

  return getPagination(pagenumber);
});


function getPagination(pagenumber){
  var getUrl = $("#getDatabypagination").data("url"); 
  var url = getUrl + "?page=" + pagenumber;
console.log(url);
  $.ajax({
    url: url,
    type: "GET",
    dataType: "HTML",
    success: function(response){
      $("#categoryList").html(response);
    } 
  });

}





</script>




{{-- unpublic status --}}
<script type="text/javascript">
  function unpublished(id){

  var check = confirm("If you want to unpublished this category, press ok");
      if(check){
        $.get("{{route('category-unpublished')}}",{id},function(data){
          $.get("{{route('allcategory')}}",function(response){
              $("#categoryList").empty().html(response);
              Swal.fire('Good job!','Category Status Unpublished!','success');
            });
          // console.log(data);
        });
      }

  }
</script>


{{-- published status  --}}

  <script>


  function published(id){
    var check = confirm("If you want to published this category , press ok");
    if(check){
      $.get("{{route('category-published')}}",{id},function(data){
        $.get("{{route('allcategory')}}",function(response){
              $("#categoryList").empty().html(response);
              Swal.fire('Good job!','Category Status published!','success');
            });
          console.log(data);
      });
    }

  }

  </script>


{{-- live search data --}}



<script type="text/javascript">
  $(document).ready(function () {
   
      $('#searchInput').on('keyup',function() {
          var query = $(this).val(); 
          $.ajax({
             
              url:"{{ route('category-search') }}",
        
              type:"GET",
             
              data:{'category':query},
             
              success:function (data) {
                
                  $('#searchResult').html(data);
              }
          })
          // end of ajax call
      });

      
      $(document).on('click', 'li', function(){
        
          var value = $(this).text();
          $('#searchInput').val(value);
          $('#searchResult').html("");
      });
  });
</script>





{{-- <script type="text/javascript">
  $('#searchInput').on('keyup',function(){
  $value=$(this).val();
  $.ajax({
  type : 'get',
  url : '{{URL::to('backend/search-category')}}',
  data:{url:$value},
  success:function(data){
    $.get("{{route('allcategory')}}",function(response){
              $("#categoryList").html(response);
              
            });
  }
  });
  })
  </script> --}}

{{-- <script> 
    $(document).ready(function(){
      $("#searchInput").on('keyup',function(){
        var result=$(this).val();
        if(result.length>=1){
          url:"{{route('category-search')}}",
          data:{
            s:result
          },
          dataType:'JSON',
          beforeSend:function(){
            $('.searchResult').html('<td>Loading....</td>');
          },
          success:function(response){
              console.log(response);
          }
        
        }
      });
    });
</script> --}}


{{-- Form validation  --}}
<script type="text/javascript">
  $(document).ready(function(){
    $('#addCategoryForm').validate({
      rules:{
        "category_name":{
          required:true,
        },
      },
      messages: {
        "category_name": {
        required: "Please enter a category name",
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
      errorPlacement:function(error, element){
        error.addClass('invalid-feedback');
        element.closest('.form-query').append(error);
      },
      highlight:function(element, errorClass, validClass){
        $(element).addClass('is-invalid');
      },
      unhighlight:function(element,errorClass,validaClass){
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

@endpush
