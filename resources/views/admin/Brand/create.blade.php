
 <!--ajax create-->
  <!-- Modal -->
  <div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="brandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="brandModalLabel">Add Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <div class="modal-body">
        <form action="{{route('brand.store')}}" method="POST" id="addbrandForm">
         @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="s brand_name">Brand Name</label>
            <input type="text" name="brand_name"  class="form-control"  placeholder="Ente brand name">
          </div>
          <div class="form-group col-md-12">
            <label for="s brand_name">Description</label>
            <input type="text" name="description"  id="description" class="form-control"  placeholder="Ente brand description">
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



 <!--ajax Edit-->
  <!-- Modal -->
  <div class="modal fade" id="UpdatebrandModal" tabindex="-1" aria-labelledby="UpdatebrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdatebrandModalLabel">Update Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <div class="modal-body">
        <form action="{{url('backend/brand/{brand}')}}" method="POST" id="updatebrandForm">
         @csrf
         @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="s brand_name">Brand Name</label>
            <input type="hidden" name="id" id="id"  class="form-control"  placeholder="Ente brand name">
            <input type="text" name="brand_name" id="brand_name"  class="form-control"  placeholder="Ente brand name">
          </div>
          <div class="form-group col-md-12">
            <label for="brand_description">Description</label>
            <input type="text" name="brand_description"  id="brand_description" class="form-control"  placeholder="Ente brand description">
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










  {{-- vie brand --}}
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

 
 
