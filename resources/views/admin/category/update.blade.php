@extends('layouts.app')
@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="categories.html" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <form action="{{ route('category.update', $category->id) }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" value="{{ $category->name }}" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Slug</label>
                                        <input type="text" value="{{ $category->slug }}" name="slug"
                                            class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Block
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status">Show on Home</label>
                                        <select name="showonHome" id="showonHome" class="form-control">
                                            <option {{ $category->showonHome == 0 ? 'selected' : '' }} value="0" >No</option>
                                            <option {{ $category->showonHome == 1 ? 'selected' : '' }} value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="image">
                                    <Label>Image</Label>
                                    <input type="file" name="image" id=""
                                        class="form-control  @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    @if ($category->image)
                                    <img style="height: 100px;width:100px;" src="{{ asset('/' . $category->image) }}"
                                    alt="" value="{{ old('image') }}">
                                <h1>image</h1>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
