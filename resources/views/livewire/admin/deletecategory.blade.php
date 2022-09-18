<!-- Delete Category -->

<div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModal">Delete Cateory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" wire:click.prevent="deletecategory">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
