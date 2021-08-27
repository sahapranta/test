@extends('layouts.app')

@section('main-content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Eelections Informations</h4>
                        </div>
                        <div class="card-body">
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Election</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($endElections as $election)
                                            <tr>
                                                <td>{{ $election->id }}</td>
                                                <td class="text-bold-500">{{ $election->name }}</td>
                                                <td class="text-bold-500">{{ $election->start }}</td>
                                                <td class="text-bold-500">{{ $election->end }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#animation-{{ $election->id }}">
                                                        See Result
                                                    </button>
    
                                                    <x-result-modal :candidates="$candidates" :id="$election->id"/>
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
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        @if(auth()->user()->image !== null)
                            <div class="avatar avatar-xl">
                                <img src="{{ asset(auth()->user()->image) }}" alt="Face 1">
                            </div>
                        @endif
                        <div class="ms-3 name">
                            <h5 class="font-bold">J{{ auth()->user()->name }}</h5>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection