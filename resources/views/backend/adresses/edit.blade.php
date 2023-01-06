@include('backend.layout.header')

<!-- Topbar -->
@include('backend.layout.topbar')
<!-- End of Topbar -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Adresler</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Adres Düzenle</h6>
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
            <form action="{{ url("/users/$user->user_id/adresses/$adress->address_id") }}" method="POST" class="row g-3">
                @csrf
                @method("PUT")
                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                <input type="hidden" name="address_id" value="{{ $adress->address_id }}">

                <div class="col-md-6">
                    <label for="city" class="form-label">Şehir</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old("city", $adress->city) }}">
                    @error("city")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="district" class="form-label">İlçe</label>
                    <input type="text" class="form-control" id="district" name="district" value="{{ old("district", $adress->district) }}">
                    @error("district")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label for="zipcode" class="form-label">Posta Kodu </label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ old("zipcode", $adress->zipcode) }}">
                    @error("zipcode")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1" {{ $adress->is_default == 1 ? "checked" : "" }}>
                        <label class="form-check-label" for="is_default">
                            Varsayılan
                        </label>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <label for="address" class="form-label">Açık Adres </label>
                    <textarea name="address" id="address" cols="20" rows="5" class="form-control">{{ $adress->address }}</textarea>
                    @error("address")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
