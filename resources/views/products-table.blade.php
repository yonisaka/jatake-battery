@php
if(gettype($data) == "object" || is_array($data))
{
foreach ($data as $k => $v) {
product($v);
}
}
else
product($data);

function product($p){
empty($p->label) ? $p->label = [] : false;
empty($p->img) ? $p->img = [] : false;
@endphp
<tr>
    <td scope="row"><b>{{ !empty($p->short)?$p->short : $p->id }}</b></td>
    <td><b>{{ $p->name }}</b></td>
    <td>{{ $p->merk }}</td>
    <td><i class="fas fa{{ $p->type == 'motor' ? '-motorcycle' : '-car' }}"></i></td>
    <td>
        @php
        foreach ($p->label as $k => $v) {
        echo '<i class="fas '.$v->value.'"></i>';
        }
        @endphp
    </td>
    <td>{{ $p->qty }}</td>
    <td>{{ $p->price }}</td>
    <td>{{ str_limit($p->deskripsi,12) }}</td>
    <td>
        @php
        foreach ($p->img as $k => $v) {
        echo '<img src="'.$v.'" alt="Gambar Product">';
        }
        @endphp
    </td>
    <td>
        <div class="d-block">Wa: {{ !empty($p->link)? $p->link->wa : '-'}}</div>
        <div class="d-block">Bukalapak: bukalapak.com</div>
        <div class="d-block">Tokopedia: bukalapak.com</div>
    </td>
    <td class="text-center">
        <button class="edit-product btn my-1 mx-1 btn-sm btn-warning" data-id="{{ $p->id }}"><i
                class="fas fa-pencil-alt mr-1"></i></button>
        <button class="delete-product btn my-1 mx-1 btn-sm btn-danger" data-id="{{ $p->id }}"><i
                class="fas fa-trash mr-1"></i></button>
    </td>
</tr>
@php
}
@endphp
