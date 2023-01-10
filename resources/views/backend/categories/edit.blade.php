@include('backend.layout.header')

<!-- Topbar -->
@include('backend.layout.topbar')
<!-- End of Topbar -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategoriler</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Düzenle</h6>
                </div>
                <div class="col-md-6">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-list"></i>
                            </span>
                        <span class="text">Listele</span>
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <form action="{{ url("/categories/$category->category_id") }}" method="POST" class="row g-3">
                @csrf
                @method("PUT")
                <input type="hidden" name="category_id" value="{{ $category->category_id }}">

                <div class="col-md-6">
                    <label for="name" class="form-label">Kategori Adı</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name", $category->name) }}">
                    @error("name")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old("slug", $category->slug) }}">
                    @error("slug")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $category->is_active == 1 ? "checked" : "" }}>
                        <label class="form-check-label" for="is_active">
                            Durum
                        </label>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-success">Düzenle</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@include('backend.layout.footer')
