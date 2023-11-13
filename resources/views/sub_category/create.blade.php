<button
    class="btn btn-primary"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasEnd"
    aria-controls="offcanvasEnd">
    Create
</button>
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasEnd"
    aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">New</h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2"
              action="{{ aurl('sub_category') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Name
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span>
                    <input
                        type="text"
                        id="basicPost"
                        name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="name" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Category
                </label>
                <div class="input-group input-group-merge">
                    <select class="form-control" name="category_id" required>
                        <option selected disabled>...</option>
                        @foreach(\App\Models\Category::get() as $i)
                            <option value="{{ $i->id }}" {{ old('category_id') == $i->id ? 'selected' : '' }} >
                                {{ $i->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>
