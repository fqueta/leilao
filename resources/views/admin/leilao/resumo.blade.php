@if (isset($d['total_views']) || isset($d['total_seguidores']))

    <div class="row mb-3">
        <div class="col-12 bg-secondary">
            <h3 class="bg-secondary">Resumo</h3>
        </div>
        <div class="col-6">
            <label for="">{{__('Visualizações')}}</label>:
            {{@$d['total_views']}}
        </div>
        <div class="col-6">
            <label for="">{{__('Seguidores')}}</label>:
            {{@$d['total_seguidores']}}
        </div>
    </div>

@endif
