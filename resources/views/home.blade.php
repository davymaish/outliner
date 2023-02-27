@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to the Outliner') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('outliner.create') }}" class="btn btn-primary btn-block">{{ __('Create New Item') }}</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('outliner.index') }}" class="btn btn-success btn-block">{{ __('View Outliner Items') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
