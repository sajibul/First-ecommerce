
 <!--ajax create-->
  <!-- Modal -->
  <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{url('backend/category')}}" method="POST" id="addCategoryForm">
         @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Category Name</label>
            <input type="text" name="category" id="name" class="form-control" id="inputEmail4" placeholder="Enter category name">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="submit"  class="btn btn-primary">Submit</button>
          {{-- <button type="submt" onclick="updateCategory()"  class="btn btn-primary">Update</button> --}}
        </div>
      </form>
      </div>
    </div>
  </div>





 {{-- Update  Category with ajax  --}}
  <!-- Modal -->
  <div class="modal fade" id="UpdatecategoryModal" tabindex="-1" aria-labelledby="UpdatecategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdatecategoryModalLabel">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{url('backend/category/{category}')}}" method="POST" id="UpdateCategoryForm">
         @csrf
         @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Category Name</label>
            <input type="hidden" name="id" id="id" class="form-control" id="inputEmail4" placeholder="Enter category name">
            <input type="text" name="category" id="category" class="form-control" id="inputEmail4" placeholder="Enter category name">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"   class="btn btn-primary">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>






  {{-- view category --}}
  <!-- Modal -->
  <div class="modal fade" id="viewCategory" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModalLabel">Category Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="category"></div>
      </div>
    </div>
  </div>

 
 
