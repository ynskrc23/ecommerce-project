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
                    <h6 class="m-0 font-weight-bold text-primary">Adresler</h6>
                </div>
                <div class="col-md-6">
                    <a href="{{ url("/users/$user->user_id/adresses/create") }}" class="btn btn-sm btn-success btn-icon-split float-right">
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
                        <th>Şehir</th>
                        <th>İlçe</th>
                        <th>Posta Kodu</th>
                        <th>Açık Adres</th>
                        <th>Varsayılan</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(count($adresses) > 0)
                        @foreach($adresses as $adress)
                            <tr id="{{$adress->address_id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$adress->city}}</td>
                                <td>{{$adress->district}}</td>
                                <td>{{$adress->zipcode}}</td>
                                <td>{{$adress->address}}</td>
                                <td>
                                    @if ($adress->is_default == 1)
                                        <span class="badge bg-success text-white">Evet</span>
                                    @else
                                        <span class="badge bg-danger text-white">Hayır</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="list-group" style="display:block;">
                                        <a href="{{ url("/users/$user->user_id/adresses/$adress->address_id/edit") }}" class="btn btn-sm btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            <span class="text">Düzenle</span>
                                        </a>
                                        <a href="{{ url("/users/$user->user_id/adresses/$adress->address_id") }}" class="btn btn-sm btn-danger btn-icon-split list-item-delete">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            <span class="text">Sil</span>
                                        </a>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Herhangi bir adres bulunamadı.</td>
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
<script>
    $(document).ready(function () {
        $('a.list-item-delete').on('click', function (e) {
            e.preventDefault()
            let url = $(this).attr('href')
            if(url !== null){
                let confirmation = confirm('Bu kaydı silmek istiyormusunuz?');
                if(confirmation){
                    axios.delete(url).then(result => {
                        console.log(result.data);
                        $("#" + result.data.id).remove();
                    }).catch(error => {
                        console.log(error)
                    })
                }
            }
        })
    })
</script>
