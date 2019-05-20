@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Brand</strong>
                        </div>
                        <div class="col-md-4">
                            <strong>Color</strong>
                        </div>
                        <div class="col-md-4">
                            <strong>Size</strong>
                        </div>                
                    </div>
                </div>

                <div class="card-body">
                    
                    @foreach ($shoes as $shoe)
                    <div class="row">
                        <div class="col-md-4">
                            {{ $shoe['brand'] }}
                        </div>
                        <div class="col-md-4">
                            {{ $shoe['color'] }}
                        </div>
                        <div class="col-md-4">
                            {{ $shoe['size'] }}
                        </div>                
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    {{ $shoes->links() }}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
