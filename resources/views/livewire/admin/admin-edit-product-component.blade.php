
<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display:block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    
                    <span></span> Edit Product
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">Edit Product</div>
                                    <div class="col-md-6">

                                        <a href="{{route('admin.products')}}" class="btn btn-success float-end">All Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                            <form wire:submit.prevent="UpdateProduct">
                                @csrf
                                <div class="mb-3-mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="from-control" placeholder="Enter Product name" wire:model="name" wire:keyup="generateSlug">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="name" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="from-control" placeholder="Enter Product slug" wire:model="slug">
                                    @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_description" id="" cols="30" rows="10" placeholder="Enter Product short description" wire:model="short_description"></textarea>
                                    @error('short_description')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Enter Product Description" wire:model="description"></textarea>
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="regular_price" class="form-label">Regular Price</label>
                                    <input type="text" name="regular_price" class="from-control" placeholder="Enter Product Regular Price" wire:model="regular_price" wire:keyup="generateSlug" wire:model="regular_price">
                                    @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <input type="text" name="sale_price" class="from-control" placeholder="Enter Product Sale Price" wire:model="sale_price" >
                                    @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="SKU" class="form-label">SKU</label>
                                    <input type="text" name="sku" class="from-control" placeholder="Enter Product SKU" wire:model="SKU" >
                                    @error('sku')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-3-mt-3">
                                    <label for="stock_status" class="form-label" wire:model="stock_status">Stock Status</label>
                                    <select class="form-control" name="stock_status" id="stock_status">
                                        <option value="instock">Instock</option>
                                        <option value="outstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-3-mt-3">
                                    <label for="featured" class="form-label" >Featured</label>
                                    <select class="form-control" name="featured" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('featured')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="quantity" class="form-label" wire:model="quantity">Quantity</label>
                                    <input type="text" name="quantity" class="from-control" placeholder="Enter Product Quantity" wire:model="quantity" >
                                    @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3-mt-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control"  wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120">
                                    @else
                                        <img src="{{asset('assets/imgs/products')}}/{{$image}}" width="120">                                        
                                    @endif
                                
                                    @error('newimage')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3-mt-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-control" name="category_id" id=""  wire:model="category_id">
                                        <option>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                       
                                      
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
