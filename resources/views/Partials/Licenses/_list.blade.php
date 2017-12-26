@if(count($licenses))
    @foreach($licenses->get() as $license)

        @php
            $expiration_date = empty($license->expiration_date) ? "" : date('m/d/Y', strtotime($license->expiration_date))
        @endphp

    <tr>
        <td> <a href="javascript:void(0);" class="toggle-edit-license" data-id="{{ $license->state_id }}" data-license="{{ $license->license_id }}" data-license-number="{{ $license->license_number }}" data-expiration-date="{{ $expiration_date }}" data-state="{{ $license->name }}">{{ $license->name }}</a> </td>
        <td>
            @if(empty($license->license_number))
            <span class='text-danger'>No License Found</span>
            @else
            {{ $license->license_number }}
            @endif
        </td>
        <td>
            @if(empty($license->license_number))
            <span class='text-danger'>No License Found</span>
            @else
            {{ date('m/d/Y', strtotime($license->expiration_date)) }}
            @endif
        </td>
        <td>
            @if($license->license_status)
            <span class='text-success'><i class="fa fa-check-circle" aria-hidden="true"></i> License Valid</span>
            @else
            <span class='text-danger'><i class="fa fa-times-circle" aria-hidden="true"></i> No License Found</span>
            @endif
        </td>
    </tr>
    @endforeach
@else
<tr>
    <td colspan="4" class="text-center">No data found.</td>
</tr>
@endif
