
 <!--ajax create-->
  <!-- Modal -->
  <div class="modal fade" id="subcategoryModal" tabindex="-1" aria-labelledby="subcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="subcategoryModalLabel">Add subcategory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('subcategory.store')}}" method="POST" id="addsubcategoryForm">
         @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="subcategory_name">Category Name</label>
            <select name="category" id="categoryes" class="form-control">
                <option disabled selected>--select--</option>
                @foreach ($category as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="subcategory_name">Subcategory Name</label>
            <input type="text" name="subcategory_name"  id="subcategory" class="form-control"  placeholder="Enter category name">
          </div>
          <div class="form-group col-md-12">
            <label for="subcategory_name">Description</label>
            <input type="text" name="description"  id="description" class="form-control"  placeholder="Enter category description">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"   class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>





 {{-- Update  Category with ajax  --}}
  <!-- Modal -->
  <div class="modal fade" id="UpdateSubcategoryModal" tabindex="-1" aria-labelledby="UpdateSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateSubcategoryModalLabel">Update Subcategory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{url('backend/subcategory/{subcategory}')}}" method="POST" id="UpdatesubCategoryForm">
          @csrf
          @method('PUT')
           <div class="form-row">
             <div class="form-group col-md-12">
               <label for="subcategory_name">Category Name</label>
               <select name="categoryes_name" id="categoryes_name" class="form-control">
                   <option disabled selected>--select--</option>
                   @foreach ($category as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
               </select>
             </div>
             <div class="form-group col-md-12">
               <label for="subcategory_name">Subcategory Name</label>
               <input type="hidden" name="id"  id="id" class="form-control"  placeholder="Enter id">
               <input type="text" name="subcategory_name"  id="subcategory_name" class="form-control"  placeholder="Enter Subcategory name">
             </div>
             <div class="form-group col-md-12">
               <label for="subcategory_name">Description</label>
               <input type="text" name="description"  id="sub_description" class="form-control"  placeholder="Enter category description">
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

 
 
