    <tr>
        <td><b>{{$element_name}}</b> {{$element_value}}</td>
        <td>
            @if($element_status != 1 && $element_status != 2 )
                <a href="/admin/aed/validate/{{$element_id}}/{{$element_key}}" class="btn btn-info" >
                    <i class="pe-7s-back-2"></i>
                </a>
            @endif

            @if($element_status != 1 && $element_status != 2 && $elemnt_new == 1)
                <a href="/admin/aed/refuse/{{$element_id}}/{{$element_key}}" class="btn btn-danger">
                    <i class="pe-7s-close"></i>
                </a>
            @endif
            
            @if($element_status == 1 )
                &nbsp; <em class="btn btn-info btn-fill" disabled>Validated</em>
            @endif

            @if($element_status == 2)
                &nbsp; <em class="btn btn-danger btn-fill" disabled>Refused</em>
            @endif

            @if($current != null)
                &nbsp;<b> Value :</b> {{$current}}
            @endif
        </td>
    </tr>