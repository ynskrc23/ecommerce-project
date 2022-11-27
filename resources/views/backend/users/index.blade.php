@include('backend.layout.header')

<!-- Topbar -->
@include('backend.layout.topbar')
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Yönetim Paneli</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Kullanıcılar</h6>
                </div>
                <div class="col-md-6">
                    <a href="{{ url("/users/create") }}" class="btn btn-sm btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Yeni Ekle</span>
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ad Soyad</th>
                            <th>Email</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->is_active == 1)
                                            <span class="badge bg-success text-white">Aktif</span>
                                        @else
                                            <span class="badge bg-danger text-white">Pasif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="list-group" style="display:block;">
                                            <a href="{{ url("/users/$user->user_id/edit") }}" class="btn btn-sm btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Düzenle</span>
                                            </a>
                                            <a href="{{ url("/users/$user->user_id") }}" class="btn btn-sm btn-danger btn-icon-split list-item-delete">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Sil</span>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <span class="text">Şifre Değiştir</span>
                                            </a>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Herhangi bir kullanıcı bulunamadı.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@include('backend.layout.footer')
