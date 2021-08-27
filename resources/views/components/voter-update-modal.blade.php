<div class="col-md-6 col-12">
    <form action="{{ route('voter.update', $voter->id) }}" method="POST" role="form" id="updateCat">
        @csrf
        @method('PUT')
        <div class="form-group">
            <!--login form Modal -->
            <div class="modal fade text-left" id="inlineForm-{{ $voter->id }}" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label>Name: </label>
                            <div class="form-group">
                                <label class="col-form-label">Username</label>
                                <input type="text" id="name" class="form-control" name="username" value="{{ $voter->username }}" placeholder="Voter username">
                            </div>
                            <label>Name: </label>
                            <div class="form-group">
                                <label class="col-form-label">Pasword</label>
                                <input type="text" id="name" class="form-control" name="password" value="{{ $voter->password }}" placeholder="Voter password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" form="updateCat">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Update</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>