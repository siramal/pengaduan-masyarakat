@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-body">

                        <h5 class="card-title">{{ $report->report_detail }}</h5>

                        <p class="card-text">
                            <small class="text-muted">{{ route('report.show', ['id' => $report->id]) }} - {{ $report->user_id }} - {{ $report->created_at }}</small>
                        </p>

                        <div>
                            <span>👁️ {{ $report->views }}</span>
                            <span>❤️ {{ $report->likes }}</span>

                            {{-- waktu --}}
                            <div class="text-gray-500 text-sm mt-2">
                                {{ \Carbon\Carbon::parse($report->created_at)->diffForHumans() }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
