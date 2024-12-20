@extends('layouts.app')

@section('section')

    <div class="content-wrapper">
        @if(Session::has('success'))
        <div class="alert alert-success text-center">
{{Session::get('success')}}
        </div>
@endif
      @if(Session::has('errors'))
        <div class="alert alert-danger text-center">
{{Session::get('errors')}}
        </div>
@endif
      @if(Session::has('undelete'))
        <div class="alert alert-default text-center">
{{Session::get('undelete')}}
        </div>
@endif

      @if(Session::has('successes'))
        <div class="alert alert-success text-center">
{{Session::get('successes')}}
        </div>
@endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sub Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{route('subcategory.create')}}" class="btn btn-primary">New Sub Category</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <form action="" method="get">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" value="{{Request::get('keywords')}}" name="keywords" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="60">ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th width="100">Status</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategory as $subcategories)
                                    <tr>
                                    <td>{{$subcategories->id}}</td>
                                    <td>{{$subcategories->name}}</td>
                                    <td>{{$subcategories->slug}}</td>
                                    <td>{{$subcategories->categories_name}}</td>
                                    <td>
                                      @if ($subcategories->status == 1)
                                            <svg class="text-success-500 h-6 w-6 text-success"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                      @else
                                            <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                      @endif
                                    </td>
                                    <td>
                                        
                                        <a href="{{route('subcategory.edit',$subcategories->id)}}">
                                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                            <form action="{{ route('subcategory.destroy', $subcategories->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf

                                                <button type="submit" class="btn btn-link p-0 text-danger">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                           
                               
                            </tbody>
                        </table>
                    </div>
                   {{ $subcategory->links() }}
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
