@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูลพนักงาน</div>
                    <div class="card-body">
                        @foreach ($staffs as $staff)
                            <form method="POST" action="{{ route('staff.update', $staff->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-end">ชื่อ</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $staff->first_name }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">นามสกุล</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $staff->last_name }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">email</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $staff->email }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end">เบอร์โทร</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $staff->phone }}" required>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
