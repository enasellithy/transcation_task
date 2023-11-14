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
              action="{{ aurl('transactions') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Category
                </label>
                <div class="input-group input-group-merge">
                    <select class="form-control" name="category_id" required id="category_id">
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
                <label class="form-label" for="basicPost">
                    Sub Category
                </label>
                <div class="input-group input-group-merge">
                    <select class="form-control" name="sub_category_id" id="sub_category_id">
                        <option selected disabled>...</option>

                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Amount
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span>
                    <input
                        type="text"
                        id="basicPost" required
                        name="amount" value="{{ old('amount') }}"
                        class="form-control @error('amount') is-invalid @enderror"  />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Payer
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span>
                    <input
                        type="text"
                        id="basicPost" required
                        name="payer" value="{{ old('payer') }}"
                        class="form-control @error('payer') is-invalid @enderror"  />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Due On
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span>
                    <input
                        type="date"
                        id="basicPost" required
                        name="due_on" value="{{ old('due_on') }}"
                        class="form-control @error('due_on') is-invalid @enderror"  />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Vat
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-percentage"></i></span>
                    <input
                        type="number"
                        id="basicPost" required
                        name="vat" value="{{ old('vat') }}"
                        class="form-control @error('vat') is-invalid @enderror"  />
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>

@push('js')
   <script>
       $('#category_id').on('change', function (){
           let category_id = $(this).val();
           $.get('{{ aurl('category') }}' + '/' + category_id, function (res){
               let out = '';
               $.each(res['data'], function (k, v){
                   out += '<option value="'+v['id']+'">'+v['name']+'</option>'
               });
               $('#sub_category_id').append('<option selected disabled>...</option>'+out);
           });
       });
   </script>
@endpush
