@extends('layout.admin')
@section('content')
    <div class="container">
        <label>Đỏi mật khẩu</label>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ url('/dashboard/doimatkhau') }}" method="post">
            @csrf
            <label for="">Email</label>
            <div class="form-group"> <input class="form-control" type="email" disabled value="{{ $admin->email }}">
            </div>
            <label for="">Tên người dùng</label>
            <div class="form-group"> <input class="form-control" name="name" type="text" value="{{ $admin->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <label for="">Mật khẩu cũ</label>
            <div class="form-group"> <input class="form-control" name="password" type="password"
                    value="">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <label for="">Mật khẩu mới</label>
            <div class="form-group"> <input class="form-control" name="newpassword" type="password"
                value="{{old('newpassword')}}">
            @error('newpassword')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
            <div class="form-group"> <input type="submit" class="btn btn-primary" value="Lưu">
            </div>
        </form>
    </div>
@endsection
