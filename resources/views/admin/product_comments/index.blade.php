@extends('layouts.app')

@section('template_title')
    Product Comment
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product Comment') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('product_comments.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> --}}
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
										<th>Comment</th>
										<th>Is Reply</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productComments as $productComment)
                                        <tr>                                            
											<td>{{ $productComment->product->product_name }}</td>
											<td>{{ $productComment->user->name }}</td>
											<td>{{ $productComment->comment }}</td>
											<td>{{ $productComment->is_reply }}</td>
                                            <td>
                                                <form action="{{ route('product_comments.destroy',$productComment->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('product_comments.show',$productComment->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('product_comments.edit',$productComment->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $productComments->links() !!}
            </div>
        </div>
    </div>
@endsection
