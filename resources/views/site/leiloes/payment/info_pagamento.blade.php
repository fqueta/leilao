<!-- Button trigger modal -->
@php
    $as = isset($info_asaas)?$info_asaas:[];
    // dd($as);
@endphp
<div class="col-12 text-end">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        {{__('Informações')}}
    </button>
</div>

  <!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="modal-info{{$id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-info{{$id}}">{{__('Informações do Pagamento')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="asaas-mdl-box row">
                <span class="asaas-mdl-header-title">{{__('Dados da fatura')}} - {{@$as['invoiceNumber']}}</span>
                <div class="asaas-mdl-box-content">
                    <div class="row">
                        <div class="col-md-6 col-sm-3 marg-b-16">
                            <div class="label">
                                {{__('Valor pago')}}
                            </div>
                            <div class="display-6 green text-success">
                                {{$as['valor']}}
                            </div>
                            @if(isset($as['installmentNumber']) && !empty($as['installmentNumber']))
                               <div>{{__('Parcelado')}} {{@$as['installmentNumber']}}x de {{$as['value']}}</div>
                            @endif
                        </div>

                        <div class="col-md-6 col-sm-3 marg-b-16">
                            <div class="label">{{__('Data de vencimento')}}</div>
                            <div class="text-secondary">
                                {{@$as['vencimento']}}
                            </div>
                            <div class="label">{{__('Data de pagamento')}}</div>
                            <div class="text-secondary">
                                {{@$as['pagamento']}}
                            </div>

                            <div class="label">Forma de pagamento:</div>
                            <div class="text-secondary">
                                {{@$as['forma_pagamento']}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="label">{{__('Descrição')}}</div>
                            <div class="js-payment-checkout-collapsable-description adjust-text">
                                <p class="pre-line"> {{@$as['description']}}</p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row marg-t-8">
                        <div class="col-md-12">

                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <a href="{{@$as['invoiceUrl']}}" target="blank" class="btn btn-outline-primary">{{__('Detalhes da fatura')}}</a>
                        </div>
                        <div class="col-md-6 mt-2">
                            <a href="{{@$as['transactionReceiptUrl']}}" target="blank" class="btn btn-outline-secondary">{{__('Comprovante')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Fechar')}}</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
</div>
