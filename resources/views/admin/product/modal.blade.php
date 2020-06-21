<div id="product-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 id="product-modal-header">Create Product</h3>
            </div>
            <div class="modal-body">
                <form id="form-edit" action="javascript:Product.save()" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="modal-body" id="product_edit">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-6 content-center">
                                    <p>Avatar</p>
                                    <img src="" id="show-img" class="img-fluid border"
                                        alt="Click to upload file" onclick="avatar.click()"
                                        style="min-width: 20vw; min-height: 15vw; width: 20vw; height: 15vw">
                                    <input type="file" name="avatar" accept="image/*" class="d-none"
                                        onchange="Product.showImg(this)">
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" id="input-name" type="text" name="name" required
                                            value="">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Price</label>
                                            <input class="form-control text-center" id="input-price" type="number" min="1000" name="price" required
                                                value="">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Amount</label>
                                            <input class="form-control text-center" id="input-amount" type="number" min="1" name="amount" required
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group w-100">
                                        <label>Category</label>
                                        <select class="form-control" id="select-category" name="category_id">
                                            @foreach (App\Category::all() as $item)
                                            <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tag</label>
                                        <select class="form-control" id="select-tag" name="tag_id[]" multiple>
                                            @foreach (App\Tag::all() as $item)
                                            <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="input-description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <textarea class="form-control" id="input-details" name="details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" id="submit-form">Save
                            <i class="fa fa-save ml-1"></i>
                        </button>
                        <button type="button" role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>