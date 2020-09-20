           <!--ajax create-->
  <!-- Modal -->
  <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="editForm" action="{{route('category.update')}}" method="POST">
         @csrf
         @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Category Name</label>
            <input type="hidden" name="id" id="id" class="form-control" id="" placeholder="Enter category name">
            <input type="text" name="category" id="name" class="form-control" id="inputEmail4" placeholder="Enter category name">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="editForm"  class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>