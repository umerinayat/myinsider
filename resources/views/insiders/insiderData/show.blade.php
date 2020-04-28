@extends('layouts.outdoor')


@section('page-title')
Insider - {{ $insider->user->first_name .' '. $insider->user->first_name  }}
@endsection

@section('main-content')



<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Insider Details') }}</h1>

    
      <a href="{{ route('updateInsiderInfo', ['token' => $insider->token->token]) }}" class="d-none ml-auto  d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-edit fa-sm"></i>
        </span>
        <span class="text"> {{ __('labels.Edit') }} </span>
      </a>


    </div>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-6 card border-light p-0">
        <h5 class="card-header"> {{ __('labels.Personal') }}: </h5>
        <dl class="row card-body" style="font-size:17px">
          <dt class="col-sm-5">{{ __('labels.Name') }}</dt>
          <dd class="col-sm-7">{{ __('auth.'.$insider->title) .' '. $insider->user->first_name .' '. $insider->user->last_name }}</dd>

          <dt class="col-sm-5"> {{ __('labels.Email') }}</dt>
          <dd class="col-sm-7">{{ $insider->user->email }}</dd>

          @php 

            $loc = str_replace('_', '-', app()->getLocale());
            if (isset( $insider->date_of_birth )) 
            {
              $dateOfBirth = date_create($insider->date_of_birth);
          
          
              if ($loc === 'de') {
                $dateOfBirth = date_format($dateOfBirth ,"d.m.Y");
              } else if ($loc === 'en') {
                $dateOfBirth = date_format($dateOfBirth ,"Y-m-d");
              }
            } else {
              $dateOfBirth = '________';
            }

          
          @endphp


          <dt class="col-sm-5">{{ __('labels.Date of Birth') }}</dt>
          <dd class="col-sm-7">{{ $dateOfBirth }}</dd>

          <dt class="col-sm-5"> {{ __('labels.National Id Number') }}</dt>
          <dd class="col-sm-7">{{ $insider->national_id_number ?? '________' }}</dd>

          <dt class="col-sm-5"> {{ __('labels.Mobile Number') }}</dt>
          <dd class="col-sm-7">{{$insider->contact->mobile_number ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.Telephone Number') }}</dt>
          <dd class="col-sm-7">{{$insider->contact->telephone_number ?? '________'}}</dd>

          

          <dt class="col-sm-5"> {{ __('labels.Fax Number') }}</dt>
          <dd class="col-sm-7">{{$insider->contact->fax_number ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.Street Address') }}</dt>
          <dd class="col-sm-7">{{$insider->address->street_address ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.Additional Address') }}</dt>
          <dd class="col-sm-7">{{$insider->address->additional_address ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.City') }}</dt>
          <dd class="col-sm-7">{{$insider->address->city ?? '________'}}</dd>

          

          <dt class="col-sm-5"> {{ __('labels.Zip Code') }}</dt>
          <dd class="col-sm-7">{{$insider->address->zip_code ?? '________'}}</dd>

          <dt class="col-sm-5">  {{ __('labels.Country') }}</dt>
          
          @php 
            if (isset ( $insider->address->country )) 
            {
              if ( $insider->address->country == 'Germany' )
              {
                $country = __('labels.Germany');
              } 
              else
              {
                $country = $insider->address->country;
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
        <h5 class="card-header">  {{ __('labels.Company') }}: </h5>
        <dl class="row card-body" style="font-size:17px">
          <dt class="col-sm-5"> {{ __('labels.Company Name') }}</dt>
          <dd class="col-sm-7">{{ $insider->company->company_name ?? '________' }}</dd>

          <dt class="col-sm-5"> {{ __('labels.Mobile Number') }}</dt>
          <dd class="col-sm-7">{{$insider->company->contact->mobile_number ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.Telephone Number') }}</dt>
          <dd class="col-sm-7">{{$insider->company->contact->telephone_number ?? '________'}}</dd>

          

          <dt class="col-sm-5"> {{ __('labels.Fax Number') }}</dt>
          <dd class="col-sm-7">{{$insider->company->contact->fax_number ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.Street Address') }}</dt>
          <dd class="col-sm-7">{{$insider->company->address->street_address ?? '________'}}</dd>


          <dt class="col-sm-5"> {{ __('labels.Additional Address') }}</dt>
          <dd class="col-sm-7">{{$insider->company->address->additional_address ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.City') }}</dt>
          <dd class="col-sm-7">{{$insider->company->address->city ?? '________'}}</dd>

         

          <dt class="col-sm-5"> {{ __('labels.Zip Code') }}</dt>
          <dd class="col-sm-7">{{$insider->company->address->zip_code ?? '________'}}</dd>

          <dt class="col-sm-5"> {{ __('labels.Country') }}</dt>

          @php 
            if (isset ( $insider->company->address->country  )) 
            {
              if ( $insider->company->address->country  == 'Germany' )
              {
                $country = __('labels.Germany');
              } 
              else
              {
                $country = $insider->company->address->country ;
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


    </div>



  </div>
</div>

<div class="card shadow mb-4">

  <div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Insider Notes') }}</h1>
    </div>
  </div>

  <div class="card-body">

    <p class="row card-body" style="font-size:17px">

      {{ $insider->notes ?? '________' }}
     
    </p>

    

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