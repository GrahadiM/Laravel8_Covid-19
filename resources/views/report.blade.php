@extends('user.layouts.index')

@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('title', 'API Corona')

@section('content')
<section class="feature_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-xl-12"></div>
            <div class="col-lg-12 col-xl-12">
                <br>
                <div class="select">
                    <form action="{{url('/apiCorona')}}" method="get">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="country" class="nice-select form-control select2">
                                        <option value="" holder>Pilih Negara</option>
                                        @foreach($country as $result)
                                        <option value="{{$result}}">{{$result}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary btn-block">Cari Data</button>
                                </div>
                            </div>
                            <div class="col-6"></div>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <img src="https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">COVID-19</h4>
                        <p class="card-text">Corona virus adalah virus yang lagi mewabah di dunia dan berasal dari china
                            tepatnya di provinsi wuhan.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">
                            <h4>{{$list_data["country"]}}</h4>
                        </li>
                        <li class="list-group-item text-center text-info">
                            <h4>{{$list_data["confirmed"]}}</h4>
                        </li>
                    </ul>
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <th>
                                    <h6 class="text-center">Meninggal</h6>
                                </th>
                                <th>
                                    <h6 class="text-center">Sembuh</h6>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-center text-danger">{{$list_data["deaths"]}}</h4>
                                </td>
                                <td>
                                    <h4 class="text-center text-success">{{$list_data["recovered"]}}</h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-center">Updated at: {{ date('d-m-Y H:i:s', strtotime($list_data["lastUpdate"])) }}</h6>
                        {{-- <h6 class="text-center">Updated at: {{ date('d-m-Y', strtotime($list_data["lastUpdate"])) }}</h6> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12"></div>
        </div>
    </div>
</section>
@endsection

@section('app')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection