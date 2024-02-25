@extends('layouts.app')
@section('title', 'พนักงาน')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3 ">เพิ่มข้อมูล</a>

                    <form action="{{ route('staff.search') }}" method="GET" class="row g-2">
                        @csrf
                        <div class="col-3">
                            <input type="text" name="s" class="form-control" placeholder="ค้นหา...."
                                value="{{ request()->get('s') }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">ค้นหา</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-1"></th>
                                    <th class="col-md-2">ชื่อ</th>
                                    <th class="col-md-2">นามสกุล</th>
                                    <th class="col-md-2">Email</th>
                                    <th class="col-md-2">เบอร์โทร</th>
                                    <th class="col-md-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->id }}</td>
                                        <td>{{ $staff->first_name }}</td>
                                        <td>{{ $staff->last_name }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->phone }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST">
                                                <div class="btn-group btn-group-sm" role="group"
                                                    aria-label="Small button group">
                                                    <a href="{{ route('staff.edit', $staff->id) }}"
                                                        class="btn btn-warning">แก้ไข
                                                    </a>
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger show_confirm"
                                                        onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $staffs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
