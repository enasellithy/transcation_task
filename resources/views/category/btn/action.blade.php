<a
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasEnd_{{$row->id}}"
    aria-controls="offcanvasEnd">
    <i class="ti ti-pencil me-1"></i>
    Edit
</a>
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasEnd_{{$row->id}}"
    aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">
            Edit
        </h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2" enctype="multipart/form-data"
              action="{{ aurl('category/'.$row->id) }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            @csrf
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    الاسم
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span>
                    <input
                        type="text"
                        id="basicPost"
                        name="name" value="{{ $row->name }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="name" />
                </div>
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>
<a href="{{ aurl('category/delete/'.$row->id) }}">
    <i class="ti ti-trash me-1"></i>
    Delete
</a>
