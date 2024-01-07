@extends('layouts.app')

@section('template_title')
    Product Sold
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product Sold') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('product_solds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Product</th>
										<th>User</th>
										<th>Final Price</th>
										<th>Payment Method</th>
										<th>Purshase Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productSolds as $productSold)
                                        <tr>
											<td>{{ $productSold->product->product_name }}</td>
											<td>{{ $productSold->user->name }}</td>
											<td>{{ $productSold->final_price }}</td>
											<td>{{ $productSold->payment_method }}</td>
											<td>{{ $productSold->purshase_date->format('Y-m-d') }}</td>

                                            <td>
                                                <form action="{{ route('product_solds.destroy',$productSold->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('product_solds.show',$productSold->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('product_solds.edit',$productSold->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productSolds->links() !!}
            </div>
        </div>
    </div>
@endsection
