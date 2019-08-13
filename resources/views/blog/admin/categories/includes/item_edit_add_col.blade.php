@php
    /** @var \App\Models\BlogCategory $item*/
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{ $item->id -1 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Created</label>
                        <input value="{{ $item->created_at }}"
                               type="text"
                               class="form-control"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Updated</label>
                        <input value="{{ $item->updated_at }}"
                               type="text"
                               class="form-control"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Deleted</label>
                        <input value="{{ $item->deleted_at }}"
                               type="text"
                               class="form-control"
                               disabled>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
@endif