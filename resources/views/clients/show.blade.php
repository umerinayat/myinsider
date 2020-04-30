@extends('layouts.master')


@section('page-title')
  {{__('labels.Client')}}
@endsection

@section('main-content')



<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Client Details') }}</h1>

      <a href="{{ route('clients.edit', ['client' => $client]) }}" class="d-none ml-auto  d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-edit fa-sm"></i>
        </span>
        <span class="text">  {{ __('labels.Edit') }} </span>
      </a>

      <form id="deleteForm" action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="POST">
        @method('DELETE')
        @csrf

        <button id="deleteBtn" type="button" class="ml-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm btn-icon-split" title="Delete" value="DELETE">
          <span class="icon text-white-50">
            <i class="fas fa-trash fa-sm"></i>
          </span>
          <span class="text"> {{ __('labels.Delete') }} </span>
        </button>

      </form>



    </div>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-6 card border-light p-0">
        <h5 class="card-header"> {{__('labels.Personal')}}: </h5>
        <dl class="row card-body" style="font-size:17px">
          <dt class="col-sm-5">{{__('labels.Name')}}</dt>
          <dd class="col-sm-7">{{ __('auth.'.$client->title) .' '. $client->user->first_name .' '. $client->user->last_name }}</dd>

          <dt class="col-sm-5">{{__('labels.Mobile Number')}}</dt>
          <dd class="col-sm-7">{{$client->contact->mobile_number ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Telephone Number')}}</dt>
          <dd class="col-sm-7">{{$client->contact->telephone_number ?? '________'}}</dd>

          

          <dt class="col-sm-5">{{__('labels.Fax Number')}}</dt>
          <dd class="col-sm-7">{{$client->contact->fax_number ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Street Address')}}</dt>
          <dd class="col-sm-7">{{$client->address->street_address ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Additional Address')}}</dt>
          <dd class="col-sm-7">{{$client->address->additional_address ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.City')}}</dt>
          <dd class="col-sm-7">{{$client->address->city ?? '________'}}</dd>



          <dt class="col-sm-5">{{__('labels.Zip Code')}}</dt>
          <dd class="col-sm-7">{{$client->address->zip_code ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Country')}}</dt>

          @php 
            if (isset ( $client->address->country )) 
            {
              if ( $client->address->country == 'Germany' )
              {
                $country = __('labels.Germany');
              } 
              else
              {
                $country = $client->address->country;
              }
            } 
            else
            {
              $country = '________';
            }
            
          @endphp

          <dd class="col-sm-7">{{$country}}</dd>

        </dl>
      </div>

      <!-- Company Details -->
      <div class="col-sm-6 card border-light p-0">
        <h5 class="card-header"> {{__('labels.Company')}}: </h5>
        <dl class="row card-body" style="font-size:17px">
          <dt class="col-sm-5">{{__('labels.Company Name')}}</dt>
          <dd class="col-sm-7">{{ $client->company->company_name ?? '________' }}</dd>

          <dt class="col-sm-5">{{__('labels.Mobile Number')}}</dt>
          <dd class="col-sm-7">{{$client->company->contact->mobile_number ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Telephone Number')}}</dt>
          <dd class="col-sm-7">{{$client->company->contact->telephone_number ?? '________'}}</dd>

          

          <dt class="col-sm-5">{{__('labels.Fax Number')}}</dt>
          <dd class="col-sm-7">{{$client->company->contact->fax_number ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Street Address')}}</dt>
          <dd class="col-sm-7">{{$client->company->address->street_address ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Additional Address')}}</dt>
          <dd class="col-sm-7">{{$client->company->address->additional_address ?? '________'}}</dd>

          <dt class="col-sm-5">{{ __('labels.City') }}</dt>
          <dd class="col-sm-7">{{$client->company->address->city ?? '________'}}</dd>

          

          <dt class="col-sm-5">{{__('labels.Zip Code')}}</dt>
          <dd class="col-sm-7">{{$client->company->address->zip_code ?? '________'}}</dd>

          <dt class="col-sm-5">{{__('labels.Country')}}</dt>

          @php 
            if (isset ( $client->company->address->country )) 
            {
              if ( $client->company->address->country == 'Germany' )
              {
                $country = __('labels.Germany');
              } 
              else
              {
                $country = $client->company->address->country;
              }
            } 
            else
            {
              $country = '________';
            }
            
          @endphp

          <dd class="col-sm-7">{{  $country }}</dd>

        </dl>
      </div>


    </div>



  </div>
</div>

<div class="card shadow mb-4">

  <div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Client Account Details') }}</h1>
    </div>
  </div>

  <div class="card-body">

    <dl class="row card-body" style="font-size:17px">
      <dt class="col-sm-2">{{ __('labels.Email') }}</dt>
      <dd class="col-sm-10 pb-2">{{ $client->user->email }}</dd>
      <dt class="col-sm-2"> {{ __('labels.Is Active') }}</dt>

      @php

        $loc = str_replace('_', '-', app()->getLocale());

        if ($loc === 'de') {
          $isActive = $client->user->is_active ? 'Ja' : 'Nein';
        } else if ($loc === 'en') {
          $isActive = $client->user->is_active ? 'YES' : 'NO';
        }

    @endphp


      <dd class="col-sm-10">{{ $isActive }}</dd>
    </dl>

    

  </div>
</div>


@endsection


@section('extra-script')
  <script>

       // confrim delete 
       $('#deleteBtn').on('click', function (evt) {
            evt.preventDefault();
            var commitModal = Swal.fire({
                title: '{{ __("labels.Confrim Delete.") }}',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: '{{ __("labels.NO") }}',
                cancelButtonColor: 'rgb(48, 133, 214)',
                confirmButtonColor: '#FA8072',
                confirmButtonText: '{{ __("labels.YES") }}',
                showConfirmButton: true,
            }).then((result) => {
                if (result.value) {
                  // Swal.fire(
                  //   '{{ __("labels.Deleted!") }}',
                  //   '{{ __("labels.Project has been deleted.") }}',
                  //     'success'
                  //   )
                    $('#deleteForm').submit();
                } else {
                    //
                }
            });
        });

  </script>

@endsection

