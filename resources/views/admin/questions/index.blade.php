@extends('admin.layout')
@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">{{__('Question')}}</h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus
                        vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard
                                    Template</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">

            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Total Revenue</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">$12099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Affiliate Revenue</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">$12099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue2"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Refunds</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">0.00</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                <span>N/A</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Avg. Revenue Per User</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">$28000</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                <span>-2.00%</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue4"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ============================================================== -->

                <!-- ============================================================== -->

                <!-- recent orders  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="p-2">
                        <a href="{{route('admin.questions.export')}}">
                            <button id="export-questions" type="button" class="btn btn-primary">Export</button>
                        </a>
                        <a href="{{route('admin.questions.showImport')}}">
                            <button id="import-questions" type="button" class="btn btn-primary">Import</button>
                        </a>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Recent Orders</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">#</th>
                                            <th class="border-0">{{__('Category')}}</th>
                                            <th class="border-0">{{__('Vocabolary')}}</th>
                                            <th class="border-0">{{__('Question')}}</th>
                                            <th class="border-0">{{__('Answer A')}}</th>
                                            <th class="border-0">{{__('Answer B')}}</th>
                                            <th class="border-0">{{__('Answer C')}}</th>
                                            <th class="border-0">{{__('Answer D')}}</th>
                                            <th class="border-0">{{__('Answer')}}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $question)
                                        <tr>
                                            <td>{{$question->id}}</td>
                                            <td>{{$question->category->name}}</td>
                                            <td>{{$question->vocabulary->name}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>{{$question->a}}</td>
                                            <td>{{$question->b}}</td>
                                            <td>{{$question->c}}</td>
                                            <td>{{$question->d}}</td>
                                            <td>{{$question->answer}}</td>
                                            <td><a href="{{route('admin.questions.edit',$question->id)}}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a onclick='return confirm(" Are you sure you wish to delete that?")'
                                                    href="{{route('admin.questions.destroy',$question->id)}}"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="d-flex justify-content-center">
                                {{$questions->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end recent orders  -->


            </div>
        </div>
    </div>
    @endsection
