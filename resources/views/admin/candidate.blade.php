@extends('layouts.app')

@push('styles')
@notifyCss
@endpush
@section('main-content')
    <section id="horizontal-input">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <x:notify-messages/>
                    <div class="card-header">
                        <h3 class="card-title">Create Candidate</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label">Candidate Imge</label>
                                <input type="file" id="image" class="form-control" name="image" placeholder="Candidate image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Candidate Name</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Candidate name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Candidate Id</label>
                                <input type="text" id="name" class="form-control" name="candidate_id" placeholder="Candidate id">
                                @error('candidate_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Election Slogan</label>
                                <input type="text" id="slogan" class="form-control" name="slogan" placeholder="Slogan">
                                @error('slogan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <fieldset class="form-group">
                                <label class="col-form-label">Designated Category</label>
                                <select class="form-select" id="basicSelect" name="category_id">
                                    <option>Select Category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create Candidate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Candidates</h4>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>IMAGE</th>
                                        <th>NAME</th>
                                        <th>CANDIDATE ID</th>
                                        <th>SLOGAN</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidates as $candidate)
                                        <tr>
                                            <td class="text-bold-500">{{ $candidate->id }}</td>
                                            <td>
                                                @if($candidate->image !== null)
                                                    <img src="{{ asset($candidate->image) }}" alt="" class="img-thumbnail candidate-thumb my-pond">
                                                @endif
                                            </td>
                                            <td>{{ $candidate->name }}</td>
                                            <td>{{ $candidate->candidate_id }}</td>
                                            <td>{{ $candidate->slogan }}</td>
                                            <td class="d-flex">
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm-{{ $candidate->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                    </svg>
                                                </button>
                                                <x-candidate-update-modal :candidate="$candidate" :categories="$categories"/>
                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#animation-{{ $candidate->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                    </svg>
                                                </button>

                                                <x-candidate-delete-modal :id="$candidate->id"/>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@notifyJs
@endpush