@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if(session('success')) {{-- if we store a success message in the session it will be displayed  --}}
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

        <!-- if a post is deleted -->
        @if(session('danger')) {{-- if we store a success message in the session it will be displayed  --}}
                <div class="alert alert-danger" role="alert">
                    {{ session('danger') }}
                </div>
            @endif


        <form action="{{ route('publication.create') }}" method="post">
                @csrf
                <div class="card gedf-card">
                  <div class="card-header">
                      Create a new post
                  </div>
                  <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="publications" role="tabpanel" aria-labelledby="publications-tab">
                            <div class="form-group">
                              <label for="title">Title :</label>
                              <input type="text" name="title" placeholder="Publication Title" class="form-control" value="{{ old('title') }}">
                              @error('title')
                                <small class="text-danger">{{ $message}}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="message">Body :</label>
                              <textarea name="body" class="form-control" id="message" rows="3" placeholder="What are you thinking?">{{ old('body') }}</textarea>
                              @error('body')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                          </div>
                      </div>
                      <div class="btn-toolbar justify-content-between">
                          <div class="btn-group">
                              <button type="submit" class="btn btn-primary">share</button>
                          </div>
                      </div>
                  </div>
                </div>
            </form>


        <h1 class="my-4">Publications</h1>
 
            @forelse ($publications as $publication)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $publication->title }}</h2>
                        <p class="card-text">{{ $publication->body }}</p>
                        {{-- @if (auth()->user()->id == $publication->user_id)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('publication.edit', $publication) }}" class="btn btn-primary">Update</a>
                                <form method="POST" action="{{ route('publication.delete', $publication) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger float-right">delete</button>
                                </form>  
                            </div>
                        @endif --}}
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $publication->created_at }} by {{ $publication->user->email }}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No Posts for now.</div>
            @endempty
        </div>
    </div>
</div>
@endsection
