@include('backend.layout.header')

<!-- Topbar -->
@include('backend.layout.topbar')
<!-- End of Topbar -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kullanıcılar</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Kullanıcı Düzenle</h6>
                </div>
                <div class="col-md-6">
                    <a href="{{ url("/users") }}" class="btn btn-sm btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-list"></i>
                            </span>
                        <span class="text">Listele</span>
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <form action="{{ url("/users/$user->user_id") }}" method="POST" class="row g-3">
                @csrf
                @method("PUT")
                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                <div class="col-md-6">
                    <label for="name" class="form-label">Ad Soyad</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name", $user->name) }}">
                    @error("name")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">E-posta</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old("email", $user->email) }}">
                    @error("email")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1" {{ $user->is_admin == 1 ? "checked" : "" }}>
                        <label class="form-check-label" for="is_admin">
                            Yetkili Kullanıcı
                        </label>
                    </div>
                </div>

                <div class="col-6 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $user->is_active == 1 ? "checked" : "" }}>
                        <label class="form-check-label" for="is_active">
                            Aktif Kullanıcı
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

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
    <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2022</span>
    </div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
@include('backend.layout.footer')
