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
                    <h6 class="m-0 font-weight-bold text-primary">Şifre Değiştirme</h6>
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
            <form action="{{ url("/users/$user->user_id/change-password") }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6 mt-3">
                    <label for="password" class="form-label">Şifre </label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error("password")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label for="password_confirmation" class="form-label">Şifre Tekrarı</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    @error("password")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-success">Ekle</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@include('backend.layout.footer')
