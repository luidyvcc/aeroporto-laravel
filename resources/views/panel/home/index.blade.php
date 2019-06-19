@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home  ></a> <a href="" class="bred">Dashboard</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Relatório</h1>
</div>

<div class="content-din">

    @foreach ($totais as $item)
    <div class="col-md-3 col-sm-4 col-xm-12">
        <div class="rel-dash">
            <i class="{{ $item['icon'] }}" aria-hidden="true"></i>
            <div class="text-rel">
                <h2 class="result">
                    {{ $item['title'] }}
                </h2>
                <h3 class="result-ds">
                    Total: {{ $item['total'] }}
                </h3>
            </div>
        </div>
    </div>
    @endforeach


    
</div><!--Content Dinâmico-->
    
@endsection