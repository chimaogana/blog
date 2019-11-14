@extends('user/app')
@section('bg-img',asset('users/img/contact-bg.jpg'))
@section('title','Welcome to our blog')
@section('sub-title','')
@section('content')

  <!-- Main Content -->
  
      
                        
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


















































































