@component('mail::message')

@if (isset($type))
    @if($type=='notifica_superado')
        <h1>Olá {{ $user->name }}</h1>
        <p>Seu lance para o <b>{{$user->nome_leilao}}</b> foi superado </p>
        @component('mail::button',['url'=>$user->link_leilao])
        Novo Lance
        @endcomponent
        <small>Lembrando que para dar um lance é necessário estar logado!</small>
    @elseif ($type=='notifica_finalizado')
        @php
            echo $mensagem;
        @endphp
        @component('mail::button',['url'=>$user->link_leilao])
            {{__('Pagamento')}}
        @endcomponent
    @endif
@endif

@endcomponent
