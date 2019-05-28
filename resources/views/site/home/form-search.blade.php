<div class="actions-form">
    <h2>Encontre: </h2>
    
    <form action="{{ route('site.flights.search') }}" class="form-home text-center" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" name="origin" list="origin" class="form-control" placeholder="Aeroporto Origem">
            <datalist id="origin">
                @forelse ($airports as $airport)
                    <option value="{{ $airport->id }} - {{ $airport->city->name }} / {{ $airport->name }}">
                @empty
                    <option value="Nenhum ragistro">
                @endforelse
            </datalist>
        </div>

        <div class="form-group">
            <input type="text" name="destination" list="destination" class="form-control" placeholder="Aeroporto Destino">
            <datalist id="destination">
                @forelse ($airports as $airport)
                    <option value="{{ $airport->id }} - {{ $airport->city->name }} / {{ $airport->name }}">
                @empty
                    <option value="Nenhum ragistro">
                @endforelse
            </datalist>
        </div>

        <div class="form-group">
            <input type="date" name="date" class="form-control" placeholder="Data">
        </div>

        <button class="btn" type="submit">
            Procurar <i class="fa fa-search" aria-hidden="true"></i>
        </button>

    </form>

</div><!--actions-form-->