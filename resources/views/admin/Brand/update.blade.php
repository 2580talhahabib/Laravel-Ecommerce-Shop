@extends('layouts.app')
@section('section')
    <div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Update Brand</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="brands.html" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
                    <form action="{{route('Brand.update',$Brand->id)}}" method="POST">
                        @csrf
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" value="{{$Brand->name}}" name="name" id="name" class="form-control @error('name')
                                                is-invalid
                                            @enderror " placeholder="Name">	
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">Slug</label>
											<input type="text" value="{{$Brand->slug}}" name="slug" id="slug" class="form-control @error('slug')
                                                is-invalid
                                            @enderror" placeholder="Slug">	
                                               @error('slug')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
										</div>
									</div>		
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="form-label">Status</label>
											<select  id="" class="form-control" name="status">
                                                <option value="1" {{ $Brand->status== 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{ $Brand->status== 0 ? 'selected' : ''}}>Block</option>
                                            </select>
										</div>
									</div>									
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</div>
                    </form>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
@endsection