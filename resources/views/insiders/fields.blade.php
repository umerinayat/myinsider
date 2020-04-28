

<!-- Personal Details -->
<div class="card border-light mb-3">
    <h5 class="card-header">{{ __('labels.Personal') }}:</h5>
    <div class="card-body">
        <!-- First and last name row -->
        <div class="form-group row">
            <!-- title -->
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="title">{{ __('labels.Title') }} * </label>

                <select required name="title" id="title" class="form-control  @error('title') is-invalid @enderror" value="{{ isset($insider) ? $insider->title : '' }}" >
                    <option value="Mr" {{ (isset($insider) && $insider->title === 'Mr') ? 'selected' : '' }}>{{__('auth.Mr')}}</option>
                    <option value="Ms" {{ (isset($insider) && $insider->title === 'Ms') ? 'selected' : '' }}>{{__('auth.Ms')}}</option>
                    <option value="Mr Dr" {{ (isset($insider) && $insider->title === 'Mr Dr') ? 'selected' : '' }}>{{ __('auth.Mr Dr') }}</option>
                    <option value="Ms Dr" {{ (isset($insider) && $insider->title === 'Ms Dr') ? 'selected' : '' }}>{{ __('auth.Ms Dr') }}</option>
                </select>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-4">

                <!-- first name -->
                <label  for="first_name">{{ __('labels.First Name') }} * </label>
                <input required id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ isset($insider) ? $insider->user->first_name : old('first_name')  }}"  placeholder="" autocomplete="first_name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-4">
                <!-- last name  -->
                <label for="last_name">{{ __('labels.Last Name') }} * </label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ isset($insider) ? $insider->user->last_name : old('last_name')  }}" required placeholder="" autocomplete="last_name" autofocus>

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

           

        </div>

        <div class="form-group row">
        
            <div class="col-sm-4"> 

                <label for="email">{{ __('labels.Email') }} *</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($insider) ? $insider->user->email : old('email')  }}" required placeholder="" autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            @php
                $loc = str_replace('_', '-', app()->getLocale());
                if (isset ($insider->date_of_birth)) {
                    $dateOfBirth = date_create($insider->date_of_birth);

                    if ($loc === 'de') {
                        $dateOfBirth = date_format($dateOfBirth ,"d.m.Y");
                    } else if ($loc === 'en') {
                        $dateOfBirth = date_format($dateOfBirth ,"Y-m-d");
                    }
                   
                } else {
                    $dateOfBirth = '';
                    
                }

            @endphp

            <div class="col-sm-4">
                <!-- date_of_birth  -->
                <label for="date_of_birth">{{ __('labels.Date of Birth') }} </label>
               
                <input id="date_of_birth" type="text" class="form-control flatpickr-input  datep @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ isset($insider) ? $dateOfBirth : old('date_of_birth')   }}"  placeholder="{{ __('labels.Select Date Of Birth') }}" autocomplete="date_of_birth" autofocus>

                @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <!-- date_of_birth  -->
                <label for="national_id_number">{{ __('labels.National Id Number') }} </label>
                <input id="national_id_number" type="text" class="form-control @error('national_id_number') is-invalid @enderror" name="national_id_number" value="{{ isset($insider) ? $insider->national_id_number : old('national_id_number')   }}"  placeholder="" autocomplete="national_id_number" autofocus>

                @error('national_id_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>



        
        <div class="form-group row">

            <div class="col-sm-4 mb-3 mb-sm-0">

                <label for="telephone_number">{{ __('labels.Telephone Number') }}</label>
                <input id="telephone_number" type="text" class="form-control @error('telephone_number') is-invalid @enderror" name="telephone_number" value="{{ isset($insider) ? $insider->contact->telephone_number : old('telephone_number')  }}"  placeholder="" autocomplete="telephone_number" autofocus>

                @error('telephone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



            </div>

            <div class="col-sm-4">

                <label for="mobile_number">{{ __('labels.Mobile Number') }}</label>
                <input id="mobile_number" type="text" class="form-control  @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ isset($insider) ? $insider->contact->mobile_number : old('mobile_number')  }}"  placeholder="" autocomplete="mobile_number" autofocus>

                @error('mobile_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">

                <label for="fax_number">{{ __('labels.Fax Number') }}</label>
                <input id="fax_number" type="text" class="form-control  @error('fax_number') is-invalid @enderror" name="fax_number" value="{{ isset($insider) ? $insider->contact->fax_number : old('fax_number')  }}"  placeholder="" autocomplete="fax_number" autofocus>

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
                <label for="street_address">{{ __('labels.Street Address') }} *</label>
                <input id="street_address" type="text" class="form-control  @error('street_address') is-invalid @enderror" name="street_address" value="{{ isset($insider) ? $insider->address->street_address : old('street_address')  }}"  placeholder="" autocomplete="street_address" autofocus>

                @error('street_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-6">

                <label for="additional_address"> {{ __('labels.Additional Address') }} *</label>
                <input id="additional_address" type="text" class="form-control  @error('additional_address') is-invalid @enderror" name="additional_address" value="{{ isset($insider) ? $insider->address->additional_address : old('additional_address')  }}"  placeholder="" autocomplete="additional_address" autofocus>


                @error('additional_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


            </div>

        </div>


        <div class="form-group row">

           

            <div class="col-sm-4">

                <label for="zip_code">{{ __('labels.Zip Code') }}</label>
                <input id="zip_code" type="text" class="form-control  @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ isset($insider) ? $insider->address->zip_code : old('zip_code')  }}"  placeholder="" autocomplete="zip_code" autofocus>

                @error('zip_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="city">{{ __('labels.City') }}</label>
                <input id="city" type="text" class="form-control  @error('city') is-invalid @enderror" name="city" value="{{ isset($insider) ? $insider->address->city : old('city')  }}"  placeholder="" autocomplete="city" autofocus>

                @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <!-- country -->
                <label for="country"> {{ __('labels.Country') }}</label>
               
                <select name="country" id="country" class="form-control c-select  @error('country') is-invalid @enderror" value="{{ isset($insider) ? $insider->address->country : old('country')  }}" >
                    <option value="0" disabled selected>{{ __('labels.Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{$country}}" {{ (isset($insider) && $insider->address->country === $country) || old('country') == $country ? 'selected' : '' }}>
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

        <div class="form-group">
       

       
           <!-- notes  -->
           <label for="notes">{{ __('labels.Notes') }} *</label>
           <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ isset($insider) ? $insider->notes : old('notes')   }}"  placeholder="" autocomplete="notes" autofocus>{{ isset($insider) ? $insider->notes : old('notes')  }}</textarea>

           @error('notes')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
           @enderror
       
   </div>

   <div class="form-group">
   <label for="language">{{ __('labels.Language') }} *</label>

<select name="language" id="language" class="form-control  @error('language') is-invalid @enderror" value="{{ isset($insider) ? $insider->language : old('language')  }}" required>
<option value="0" disabled selected> {{ __('labels.Select Language') }} </option>
    <option value="english" {{ (isset($insider) && $insider->language === 'english') || old('language') == 'english' ? 'selected' : '' }}>{{ __('labels.English') }}</option>
    <option value="german" {{ (isset($insider) && $insider->language === 'german') || old('language') == 'german' ? 'selected' : '' }}>{{ __('labels.German') }}</option>
</select>

@error('title')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
   </div>

    </div>
</div>

<!-- Company Details -->
<div class="card border-light mb-3">
    <h5 class="card-header"> {{ __('labels.Company') }}:</h5>

    <div class="card-body">
        <!-- Company Fields -->
        <div class="form-group">

            <label for="company_name"> {{ __('labels.Company Name') }} *</label>
            <input id="company_name" type="text" class="form-control  @error('company_name') is-invalid @enderror" name="company_name" value="{{ isset($insider) ? $insider->company->company_name : old('company_name') }}"  placeholder="" autocomplete="company_name" autofocus>


            @error('company_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror



        </div>

        <!-- Company and phone number row -->
        <div class="form-group row">

            <div class="col-sm-4 mb-3 mb-sm-0">

                <label for="c_telephone_number"> {{ __('labels.Telephone Number') }} </label>
                <input id="c_telephone_number" type="text" class="form-control  @error('c_telephone_number') is-invalid @enderror" name="c_telephone_number" value="{{ isset($insider) ? $insider->company->contact->telephone_number : old('c_telephone_number') }}"  placeholder="" autocomplete="c_telephone_number" autofocus>

                @error('c_telephone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-4">
                <label for="c_mobile_number"> {{ __('labels.Mobile Number') }}</label>
                <input id="c_mobile_number" type="text" class="form-control  @error('c_mobile_number') is-invalid @enderror" name="c_mobile_number" value="{{ isset($insider) ? $insider->company->contact->mobile_number : old('c_mobile_number') }}"  placeholder="" autocomplete="c_mobile_number" autofocus>

                @error('c_mobile_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="c_fax_number">{{ __('labels.Fax Number') }}</label>
                <input id="c_fax_number" type="text" class="form-control @error('c_fax_number') is-invalid @enderror" name="c_fax_number" value="{{ isset($insider) ? $insider->company->contact->fax_number : old('c_fax_number')  }}"  placeholder="" autocomplete="c_fax_number" autofocus>

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

                <label for="c_street_address"> {{ __('labels.Street Address') }} *</label>
                <input id="c_street_address" type="text" class="form-control  @error('c_street_address') is-invalid @enderror" name="c_street_address" value="{{ isset($insider) ? $insider->company->address->street_address : old('c_street_address')  }}"  placeholder="" autocomplete="c_street_address" autofocus>


                @error('c_street_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


            </div>

            <div class="col-sm-6">

                <label for="c_additional_address"> {{ __('labels.Additional Address') }} *</label>
                <input id="c_additional_address" type="text" class="form-control  @error('c_additional_address') is-invalid @enderror" name="c_additional_address" value="{{ isset($insider) ? $insider->company->address->additional_address : old('c_additional_address')  }}"  placeholder="" autocomplete="c_additional_address" autofocus>


                @error('c_additional_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


            </div>

 

        </div>

        <div class="form-group row">

          

            <div class="col-sm-4">

                <label for="c_zip_code">{{ __('labels.Zip Code') }}</label>
                <input id="c_zip_code" type="text" class="form-control  @error('c_zip_code') is-invalid @enderror" name="c_zip_code" value="{{ isset($insider) ? $insider->company->address->zip_code : old('c_zip_code') }}"  placeholder="" autocomplete="c_zip_code" autofocus>

                @error('c_zip_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">

                <label for="c_city">{{ __('labels.City') }}</label>
                <input id="c_city" type="text" class="form-control  @error('c_city') is-invalid @enderror" name="c_city" value="{{ isset($insider) ? $insider->company->address->city : old('c_city') }}"  placeholder="" autocomplete="c_city" autofocus>

                @error('c_city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <!-- country -->
                <label for="c_country">{{ __('labels.Country') }}</label>
               

                <select name="c_country" id="c_country" class="form-control c-select  @error('c_country') is-invalid @enderror" value="{{ isset($insider) ? $insider->company->address->country : old('c_country') }}" >
                    <option value="0" disabled selected> {{ __('labels.Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{$country}}" {{ (isset($insider) && $insider->company->address->country === $country) || old('c_country') == $country ? 'selected' : '' }}>
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