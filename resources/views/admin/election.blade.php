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
                        <h3 class="card-title">Create Eelection</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('election.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label">Election</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Election name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Start Election</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Runnig Election</h4>
                             <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Election</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($startElections as $election)
                                            <tr>
                                                <td>{{ $election->id }}</td>
                                                <td class="text-bold-500">{{ $election->name }}</td>
                                                <td class="d-flex">
                                                    <form action="{{ route('election.destroy') }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger">End Election</button>
                                                    </form>
                                                    <button type="button" class="btn btn-outline-success">See Result</button>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td>There is no election</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Recent Election</h4>
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Election</th>
                                            <th>Candidate</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($elections as $election)
                                            <tr>
                                                <td>{{ $election->id }}</td>
                                                <td class="text-bold-500">{{ $election->name }}</td>
                                                <td class="text-bold-500">{{ $election->name }}</td>
                                                <td class="text-bold-500">{{ $election->start }}</td>
                                                <td class="text-bold-500">{{ $election->end }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#animation-{{ $election->id }}">
                                                       See Result
                                                    </button>
    
                                                    <x-result-modal :election="$election"/>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td>There is no election</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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