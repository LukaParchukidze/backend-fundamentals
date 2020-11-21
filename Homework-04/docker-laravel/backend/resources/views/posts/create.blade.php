@extends("layout.layout")

@section("content")
    <div>
        <form  method="post" enctype="multipart/form-data" action="{{route('posts.save')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <label>
                        <input type="text" class="form-control @error('title') 'is-invalid' @enderror"  placeholder="Name" name="title" value="{{old('title')}}">
                    </label>

                    @error('title')
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Description</label>
                    <label>
                        <input type="text" class="form-control @error('description') 'is-invalid' @enderror"  placeholder="Name" name="description"  value="{{old('description')}}">
                    </label>

                    @error('description')
                    <p class="text-danger">{{ $errors->first('description') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Likes</label>
                    <label>
                        <input type="text" class="form-control @error('likes') 'is-invalid' @enderror"  placeholder="Name" name="likes"  value="{{old('likes')}}">
                    </label>

                    @error('likes')
                    <p class="text-danger">{{ $errors->first('likes') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <select name="tags[]" id="" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
