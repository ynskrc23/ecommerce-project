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
                    <h6 class="m-0 font-weight-bold text-primary">Kullanıcı Ekle</h6>
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
           <form action="{{ url("/users") }}" method="POST" class="row g-3">
               @csrf
               <div class="col-md-6">
                   <label for="name" class="form-label">Ad Soyad</label>
                   <input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}">
                   @error("name")
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>

               <div class="col-md-6">
                   <label for="email" class="form-label">E-posta</label>
                   <input type="text" class="form-control" id="email" name="email" value="{{ old("email") }}">
                   @error("email")
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>

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

               <div class="col-6 mt-3">
                   <div class="form-check">
                       <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1">
                       <label class="form-check-label" for="is_admin">
                           Yetkili Kullanıcı
                       </label>
                   </div>
               </div>

               <div class="col-6 mt-3">
                   <div class="form-check">
                       <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1">
                       <label class="form-check-label" for="is_active">
                           Aktif Kullanıcı
                       </label>
                   </div>
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
