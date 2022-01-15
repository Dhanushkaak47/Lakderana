@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card bg-danger text-center text-light font-weight-bold">
                        <h3 class="mt-5 mb-5">Your current login credentials not elegible to this process. Please use correct username and password</h3>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
