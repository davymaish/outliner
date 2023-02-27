@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Outline Item') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('outliner.update', $outliner->id) }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $outliner->title }}" required autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ $outliner->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @if(!$outliner->isParent())
                            <div class="form-group row mb-3">
                                <label for="parent_id" class="col-md-4 col-form-label text-md-right">{{ __('Parent Item') }}</label>
                                <div class="col-md-6">
                                    <select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                        <option value="">None</option>
                                        @foreach ($parent_items as $parent)
                                            <option value="{{ $parent->id }}" {{ ($outliner->parent_id == $parent->id) ? 'selected' : '' }}>{{ $parent->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
