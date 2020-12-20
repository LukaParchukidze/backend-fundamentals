@extends("employees.home")

@section("content")
    <div class="row justify-content-center mt-4">
        <h1>
            EDIT EMPLOYEE
        </h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="post" enctype="multipart/form-data" action="{{route('employees.update', $employee->id)}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Name</label>
                        <label>
                            <input type="text" class="form-control"  placeholder="Name" name="name" value="{{old('name', $employee->name)}}">
                        </label>

                        @error('name')
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Surname</label>
                        <label>
                            <input type="text" class="form-control"  placeholder="Surname" name="surname" value="{{old('surname', $employee->surname)}}">
                        </label>

                        @error('surname')
                            <p class="text-danger">{{ $errors->first('surname') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Position</label>
                        <label>
                            <input type="text" class="form-control"  placeholder="Position" name="position" value="{{old('position', $employee->position)}}">
                        </label>

                        @error('position')
                            <p class="text-danger">{{ $errors->first('position') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Phone</label>
                        <label>
                            <input type="text" class="form-control"  placeholder="Phone" name="phone" value="{{old('phone', $employee->phone)}}">
                        </label>

                        @error('phone')
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
