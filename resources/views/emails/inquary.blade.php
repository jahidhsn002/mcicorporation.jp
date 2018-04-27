@component('mail::message')
# Price Quotation
### (Estimate)

## {{$vehicle->name}}
### {{$country->name}}
__{{$port->name}}(port)__

@component('mail::button', ['url' => route('single', ['id'=>$vehicle->id, 'country_id'=>$country->id, 'port_id'=>$port->id]).'#step'])
Show on website
@endcomponent

@component('mail::table')
| Vehicle Price | {{$vehicle->price}} 		|
| ------------- |:-------------:|
|  Insurance    | {{$port->insurance}} 		|
|  inspection   | {{$port->inspection}} 	|
|  certificate  | {{$port->certificate}} 	|
|  warranty     | {{$port->warranty}} 		|
@endcomponent
@component('mail::table')
| 				| 							|
| ------------- |:-------------:|
|  __Total__	|__{{ $vehicle->price+$port->insurance+$port->inspection+$port->certificate+$port->warranty }}__ 	|
@endcomponent

## Applient's Info
### {{ $user->name }}
{{ $user->email }}
{{ $user->phone }}
{{ $user->city }}
{{ $user->address }}

__Thanks,__<br>
###MCI Corporation
__01986066157__

@endcomponent
