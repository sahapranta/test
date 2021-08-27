<div class="col-md-6 col-12">
    <form action="{{ route('candidate.update', $candidate->id) }}" method="POST" role="form" id="updatecandidate" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <!--login form Modal -->
            <div class="modal fade text-left" id="inlineForm-{{ $candidate->id }}" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="col-form-label">Candidate Imge</label>
                                        <input type="file" id="image" class="form-control" name="image" placeholder="Candidate image">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($candidate->image !== null)
                                        <img src="{{ asset($candidate->image) }}" alt="" class="img-thumbnail candidate-thumb">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Candidate Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ $candidate->name }}" placeholder="Candidate name">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Candidate Id</label>
                                <input type="text" id="name" class="form-control" name="candidate_id" value="{{ $candidate->candidate_id }}" placeholder="Candidate id">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Election Slogan</label>
                                <input type="text" id="slogan" class="form-control" name="slogan" value="{{ $candidate->slogan }}" placeholder="Slogan">
                            </div>
                            <fieldset class="form-group">
                                <label class="col-form-label">Designated Category</label>
                                <select class="form-select" id="basicSelect" name="category_id">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" @if($candidate->category_id == $cat->id) selected @endif>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" form="updatecandidate">
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