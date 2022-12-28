@extends('admin.master')
@section('mycontent')
    <div class="container">
        <div class="row m-2">
            <div class="col-lg-6 offset-lg-3">
                <div class='mb-3'>
                    <a href="{{route('admin#menu')}}">
                        <button class='btn btn-sm btn-dark'>Menu Index</button>
                    </a>
                </div>
                <form action="{{route('admin#menuUpdate',$menu->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="" class="formlabel">Name</label>
                        <input type="text" value="{{old('name',$menu->name)}}" name="name" id="" class="form-control @error('name')     is-invalid @enderror">
                        @error('name')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="formlabel mb-1">Image</label>
                        <div class='mb-1'>
                            <img src="{{asset('storage/'.$menu->image)}}" alt="" srcset="" width="200px">
                        </div>
                        <input type="file" name="image" id="" class="form-control @error('image')is-invalid @enderror">
                        @error('image')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="formlabel mb-1" >Price</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control @error('price') is-invalid
                            @enderror" aria-describedby="basic-addon1" name="price" value="{{old('price',$menu->price)}}">
                            <span class="input-group-text" id="basic-addon1">$</span>
                          </div>
                        @error('price')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="formlabel mb-1" >Description</label>
                        <textarea name="description" id=""  cols="30" rows="3" class="form-control @error('description') is-invalid @enderror">{{old('description',$menu->description)}}</textarea>
                        @error('description')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="formlabel mb-1">Category</label>
                        <select name="categoryId" id="" class="form-select @error('categoryId') is-invalid @enderror">
                            <option value="">Choose Category</option>
                            @foreach ($category as $c)
                            <option value="{{$c->id}}" @if($c->id == $menu->category_id)  selected @endif>{{$c->name}}</option>
                            @endforeach
                        </select>
                        @error('categoryId')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
