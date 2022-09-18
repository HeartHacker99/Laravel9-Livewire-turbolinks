<!-- Edit Category  -->

<div wire:ignore.self class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModal">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" id="product_name" name="product_name" class="form-control" wire:model.defer="product_name">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="text" id="product_price" name="product_price" class="form-control" wire:model.defer="product_price">
                    </div>
                    <div class="form-group">
                        <label for="product_category">Product Category</label>
                        <select class="form-control" wire:model.defer="product_category_id">
                            <option selected>Choose Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }} " >{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <input class="form-control" type="file" id="productImage" name="productImage" wire:model.defer="productImage">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                {{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                <button type="button" class="btn btn-primary" wire:click.prevent="update">Edit Category</button>
            </div>
        </div>
    </div>
</div>
