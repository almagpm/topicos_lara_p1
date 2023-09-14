@extends('layout.e-commerce')

@section('title', 'Contact')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST" action="{{ route('contact_post') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input value="{{old('name')}}" type="text" name="name" class="form-control" placeholder="Your Name" />
                </div>
                <div class="col-md-6">
                    <input value="{{old('email')}}" type="email" name="email" class="form-control" placeholder="Your Email" />
                </div>
            </div>
            <div class="form-group">
                <input value="{{old('name')}}" type="text" name="subject" class="form-control" placeholder="Subject" />
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message">{{old('name')}}</textarea>
            </div>
            <div><button class="btn" type="submit">Send Message</button></div>
            @if (session()->get('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
</div>
      

@endsection