@extends('layouts.master')

@section('title2')
    @if (Auth::user()->role == 'pemilik')
        Pemilik
    @elseif(Auth::user()->role == 'cutting')
        Cutting
    @elseif(Auth::user()->role == 'jahit')
        Jahit
    @elseif(Auth::user()->role == 'packing')
        Packing
    @endif
@endsection

@section('main')
<section class="section dashboard">
    @if (Auth::user()->role == 'pemilik')
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <h1>SEMUA PEGAWAI BERKAH FASHIONKU</h1>
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bagian</th>
                                    <th scope="col">Bagian</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawais as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->role }}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
            </div>
        </div><!-- End Left side columns -->
    </div>
    @endif
</section>
@endsection
@section('css')

@endsection

@section('js')

@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
            legend: {
                data: ['Allocated Budget', 'Actual Spending']
            },
            radar: {
                // shape: 'circle',
                indicator: [{
                        name: 'Sales',
                        max: 6500
                    },
                    {
                        name: 'Administration',
                        max: 16000
                    },
                    {
                        name: 'Information Technology',
                        max: 30000
                    },
                    {
                        name: 'Customer Support',
                        max: 38000
                    },
                    {
                        name: 'Development',
                        max: 52000
                    },
                    {
                        name: 'Marketing',
                        max: 25000
                    }
                ]
            },
            series: [{
                name: 'Budget vs spending',
                type: 'radar',
                data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'Allocated Budget'
                    },
                    {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'Actual Spending'
                    }
                ]
            }]
        });
    });
</script>
@endsection
