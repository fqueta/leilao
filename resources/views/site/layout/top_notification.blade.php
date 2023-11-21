@if(isset($notification['unread']) && is_object($notification['unread']))
<div class="table-responsive" style="max-height: 450px">
    <table class="table table-hover">
        <tbody>
            @foreach ($notification['unread'] as $k=>$notification)
                <tr id="tr-{{@$notification['id']}}">
                    <td class="w-25">
                        <a href="{{@$notification['data']['dlance']['link']}}">
                            <img class="w-100" src="{{@$notification['data']['dlance']['link_thumbnail']}}" />
                        </a>
                    </td>
                    <td>
                        {{-- @php
                            $dta = explode(" ", $notification['created_at']);
                        @endphp --}}
                        <b>
                            {!!@$notification['created_at']!!}
                        </b>
                        <br>
                        {!!@$notification['data']['message']!!}
                    </td>
                    <td class="text-right">
                        <button type="button" class="btn btn-light" onclick="markAsRead('{{@$notification['id']}}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endif
