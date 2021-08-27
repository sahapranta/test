<div class="modal text-left" id="animation-{{ $id }}" tabindex="-1" aria-labelledby="myModalLabel6" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>
                    Are you sure delete this post???
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button 
                    type="button" 
                    data-bs-dismiss="modal" class="d-none d-sm-block btn btn-danger" 
                    onclick="event.preventDefault(); document.getElementById('delete-category-form-{{ $id }}').submit()">
                    Delete
                </button>
                <form id="delete-category-form-{{ $id }}" style="display: none;" action="{{ route('category.destroy',$id) }}" method="post">
                    @csrf 
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>