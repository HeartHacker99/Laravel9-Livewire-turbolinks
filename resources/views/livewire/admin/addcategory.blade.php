    <!-- Add Category -->

    <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModal">Add Cateory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @error('category_name')
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                        <i class="bi-check-circle-fill"></i>
                        <strong class="mx-2">Error!</strong>
                        <span class="error">{{ $message }}</span>
                    </div>
                    @enderror
                    <form>
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" class="form-control" wire:model.defer="category_name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="addcategory">Add Category</button>
                </div>
            </div>
        </div>

    </div>
