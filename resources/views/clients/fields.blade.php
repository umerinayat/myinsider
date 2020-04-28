<!-- Login Details -->
<div class="card border-light mb-3">
    <h5 class="card-header"> {{__('labels.Login Credentials')}}: </h5>

    <div class="card-body">
        <!-- email -->
        <div class="form-group">
            <label for="email">{{ __('labels.E-Mail Address') }} * </label>
            <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($client) ? $client->user->email : old('email') }}"  placeholder="" autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <span>{{old('email')}}</span>
                <strong>{{ $message }}</strong>
               
            </span>
            @enderror
        </div>

       
        @if(!isset($client))
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="password">{{ __('labels.Password') }} *</label>
                <input required id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="" value="{{ isset($client) ? $client->user->password : '' }}"  autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-6">

                <label for="password-confirm">{{ __('labels.Confirm Password') }} *</label>
                <input required id="password-confirm" type="password" class="form-control " name="password_confirmation"  placeholder="" value="{{ isset($client) ? $client->user->password : '' }}" autocomplete="new-password">

            </div>
        </div>
        @endif

         <!-- is active -->
         <div class="form-check">
            <input  class="form-check-input" type="checkbox" name="is_active" id="is_active"  {{ ((isset($client) && $client->user->is_active === 1 || old('is_active') === 'on')) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                {{ __('labels.Is Active Client') }}
            </label>
        </div>

    </div>

</div>

<!-- Personal Details -->
<div class="card border-light mb-3">
    <h5 class="card-header">{{__('labels.Personal')}}:</h5>
    <div class="card-body">
        <!-- First and last name row -->
        <div class="form-group row">
            <!-- title -->
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="title">{{__('labels.Title')}} *</label>

                <select required  name="title" id="title" class="form-control  @error('title') is-invalid @enderror" value="{{ isset($client) ? $client->title : '' }}" >
                    <option value="Mr" {{ (isset($client) && $client->title === 'Mr') ? 'selected' : '' }}>{{__('auth.Mr')}}</option>
                    <option value="Ms" {{ (isset($client) && $client->title === 'Ms') ? 'selected' : '' }}>{{__('auth.Ms')}}</option>
                    <option value="Mr Dr" {{ (isset($client) && $client->title === 'Mr Dr') ? 'selected' : '' }}>{{ __('auth.Mr Dr') }}</option>
                    <option value="Ms Dr" {{ (isset($client) && $client->title === 'Ms Dr') ? 'selected' : '' }}>{{ __('auth.Ms Dr') }}</option>
                </select>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-4">

                <!-- first name -->
                <label for="first_name">{{__('labels.First Name')}} *</label>
                <input required  id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ isset($client) ? $client->user->first_name : old('first_name')  }}"  placeholder="" autocomplete="first_name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-4">
                <!-- last name  -->
                <label for="last_name">{{__('labels.Last Name')}} *</label>
                <input required  id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ isset($client) ? $client->user->last_name : old('last_name')  }}"  placeholder="" autocomplete="last_name" autofocus>

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>


        <div class="form-group row">

            <div class="col-sm-4 mb-3 mb-sm-0">

                <label for="telephone_number">{{__('labels.Telephone Number')}}</label>
                <input   id="telephone_number" type="text" class="form-control @error('telephone_number') is-invalid @enderror" name="telephone_number" value="{{ isset($client) ? $client->contact->telephone_number : old('telephone_number')   }}"  placeholder="" autocomplete="telephone_number" autofocus>

                @error('telephone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



            </div>

            <div class="col-sm-4">

                <label for="mobile_number">{{__('labels.Mobile Number')}}</label>
                <input  id="mobile_number" type="text" class="form-control  @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ isset($client) ? $client->contact->mobile_number : old('mobile_number')  }}"  placeholder="" autocomplete="mobile_number" autofocus>

                @error('mobile_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">

                <label for="fax_number">{{__('labels.Fax Number')}}</label>
                <input  id="fax_number" type="text" class="form-control  @error('fax_number') is-invalid @enderror" name="fax_number" value="{{ isset($client) ? $client->contact->fax_number : old('fax_number')  }}"  placeholder="" autocomplete="fax_number" autofocus>

                @error('fax_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            

        </div>

        <!-- Personal address -->
        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="street_address">{{__('labels.Street Address')}} *</label>
                <input  id="street_address" type="text" class="form-control  @error('street_address') is-invalid @enderror" name="street_address" value="{{ isset($client) ? $client->address->street_address : old('street_address')  }}"  placeholder="" autocomplete="street_address" autofocus>

                @error('street_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-6">
                <label for="additional_address">{{__('labels.Additional Address')}} *</label>
                <input  id="additional_address" type="text" class="form-control  @error('additional_address') is-invalid @enderror" name="additional_address" value="{{ isset($client) ? $client->address->additional_address : old('additional_address')  }}"  placeholder="" autocomplete="additional_address" autofocus>

                @error('additional_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

           

        </div>

        <div class="form-group row">

            

            <div class="col-sm-4">

                <label for="zip_code">{{__('labels.Zip Code')}}</label>
                <input  id="zip_code" type="text" class="form-control  @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ isset($client) ? $client->address->zip_code : old('zip_code')   }}"  placeholder="" autocomplete="zip_code" autofocus>

                @error('zip_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="city">{{__('labels.City')}}</label>
                <input  id="city" type="text" class="form-control  @error('city') is-invalid @enderror" name="city" value="{{ isset($client) ? $client->address->city : old('city')   }}"  placeholder="" autocomplete="city" autofocus>

                @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <!-- country -->
                <label for="country">{{__('labels.Select Country')}}</label>
              
                <select  name="country" id="country" class="form-control c-select @error('country') is-invalid @enderror" value="{{ isset($client) ? $client->address->country : old('country')  }}" >
                    <option value="0" disabled selected>{{ __('labels.Select Country') }}</option>
                   
                    @foreach($countries as $country)
                        <option value="{{$country}}" {{ (isset($client) && $client->address->country === $country || old('country') === $country ) ? 'selected' : '' }}>
                            {{ $country == 'Germany' ? __('labels.Germany') : $country }}
                        </option>
                    @endforeach

                    
                
                </select>
                
                @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


        </div>
    </div>
</div>

<!-- Company Details -->
<div class="card border-light mb-3">
    <h5 class="card-header">{{__('labels.Company')}}:</h5>

    <div class="card-body">
        <!-- Company Fields -->
        <div class="form-group">

            <label for="company_name">{{__('labels.Company Name')}} *</label>
            <input  id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ isset($client) ? $client->company->company_name : old('company_name') }}"   autocomplete="company_name" autofocus>


            @error('company_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror



        </div>

        <!-- Company and phone number row -->
        <div class="form-group row">

            <div class="col-sm-4 mb-3 mb-sm-0">

                <label for="c_telephone_number">{{__('labels.Telephone Number')}}</label>
                <input  id="c_telephone_number" type="text" class="form-control  @error('c_telephone_number') is-invalid @enderror" name="c_telephone_number" value="{{ isset($client) ? $client->company->contact->telephone_number : old('c_telephone_number') }}"  placeholder="" autocomplete="c_telephone_number" autofocus>

                @error('c_telephone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-4">
                <label for="c_mobile_number">{{__('labels.Mobile Number')}}</label>
                <input  id="c_mobile_number" type="text" class="form-control  @error('c_mobile_number') is-invalid @enderror" name="c_mobile_number" value="{{ isset($client) ? $client->company->contact->mobile_number : old('c_mobile_number') }}"  placeholder="" autocomplete="c_mobile_number" autofocus>

                @error('c_mobile_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="c_fax_number">{{__('labels.Fax Number')}}</label>
                <input  id="c_fax_number" type="text" class="form-control @error('c_fax_number') is-invalid @enderror" name="c_fax_number" value="{{ isset($client) ? $client->company->contact->fax_number :  old('c_fax_number') }}"  placeholder="" autocomplete="c_fax_number" autofocus>

                @error('c_fax_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            

        </div>

        <!-- Personal address -->
        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0">

                <label for="c_street_address">{{__('labels.Street Address')}} *</label>
                <input  id="c_street_address" type="text" class="form-control  @error('c_street_address') is-invalid @enderror" name="c_street_address" value="{{ isset($client) ? $client->company->address->street_address : old('c_street_address')  }}"  placeholder="" autocomplete="c_street_address" autofocus>


                @error('c_street_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


            </div>

            <div class="col-sm-6">
                <label for="c_additional_address">{{__('labels.Additional Address')}} *</label>
                <input  id="c_additional_address" type="text" class="form-control  @error('c_additional_address') is-invalid @enderror" name="c_additional_address" value="{{ isset($client) ? $client->company->address->additional_address : old('c_additional_address')  }}"  placeholder="" autocomplete="c_additional_address" autofocus>

                @error('c_additional_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>


          

        </div>

        <div class="form-group row">

            

            <div class="col-sm-4">

                <label for="c_zip_code">{{__('labels.Zip Code')}}</label>
                <input  id="c_zip_code" type="text" class="form-control  @error('c_zip_code') is-invalid @enderror" name="c_zip_code" value="{{ isset($client) ? $client->company->address->zip_code : old('c_zip_code') }}"  placeholder="" autocomplete="c_zip_code" autofocus>

                @error('c_zip_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">

                <label for="c_city">{{__('labels.City')}}</label>
                <input  id="c_city" type="text" class="form-control  @error('c_city') is-invalid @enderror" name="c_city" value="{{ isset($client) ? $client->company->address->city : old('c_city') }}"  placeholder="" autocomplete="c_city" autofocus>

                @error('c_city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <!-- country -->
                <label for="c_country">{{__('labels.Select Country')}} </label>
             
                <select   name="c_country" id="c_country" class="form-control c-select @error('c_country') is-invalid @enderror" value="{{ isset($client) ? $client->company->address->country : old('c_country') }}" >
                    <option value="0" disabled selected>{{ __('labels.Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{$country}}" {{ (isset($client) && $client->company->address->country === $country || old('c_country') === $country) ? 'selected' : '' }}>
                        {{ $country == 'Germany' ? __('labels.Germany') : $country }}
                        </option>
                    @endforeach

                </select>

                @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

</div>