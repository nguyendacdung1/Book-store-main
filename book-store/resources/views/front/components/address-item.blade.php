<div class="address-item"
     city="{{$address->city}}"
     district="{{$address->district}}"
     region="{{$address->ward}}"
>
    <p>{{$address->full_name}}
        @if($address->default==1)
            <span class="icon-default">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.25" height="16.25" viewBox="0 0 16.25 16.25">
                        <path id="Icon_ionic-md-checkmark-circle-outline" data-name="Icon ionic-md-checkmark-circle-outline" d="M6.669,8.456,5.531,9.594,9.188,13.25l8.125-8.125L16.175,3.988,9.188,10.934ZM16.5,10a6.472,6.472,0,1,1-4.712-6.256l1.259-1.259A7.558,7.558,0,0,0,10,1.875,8.125,8.125,0,1,0,18.125,10Z" transform="translate(-1.875 -1.875)" fill="#323c7a"></path>
                    </svg>
            </span>
        @endif

    </p>
    <p>{{$address->phone}}</p>
    <p class="m-address">Hà Nội,quận Cầu Giấy, phường Mai Dịch, phố Doãn Kế Thiện</p>
    <p>{{$address->describe}}</p>
    <a href="./account/address/{{$address->id}}/edit" class="btn edit-address">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>
    <form action="./account/address/{{$address->id}}" method="post">
        @csrf
        @method('DELETE')
        <input type="text" name="id" hidden value="{{$address->id}}">
        <button class="btn edit-address edit-delete"
                style="right: 42px"
                onclick="confirm('Do you want to delete this address?')?this.form.submit():''"
        >
            <i style="color: #ee8d80" class="fa-regular fa-trash"></i>
        </button>
    </form>

</div>
