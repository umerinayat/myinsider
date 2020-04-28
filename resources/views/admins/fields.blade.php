<!-- Login Details -->
<div class="card border-light mb-3">
    <h5 class="card-header"> {{__('labels.Login Credentials')}}: </h5>

    

    <div class="card-body">

    <div class="form-group row">
        

            <div class="col-sm-6">

                <!-- first name -->
                <label for="first_name">{{__('labels.First Name')}} </label>
                <input required id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ isset($admin) ? $admin->first_name : old('first_name')  }}"  placeholder="" autocomplete="first_name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-6">
                <!-- last name  -->
                <label for="last_name">{{__('labels.Last Name')}} </label>
                <input required id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ isset($admin) ? $admin->last_name : old('last_name')  }}"  placeholder="" autocomplete="last_name" autofocus>

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>


        <!-- email -->
        <div class="form-group">
            <label for="email">{{ __('labels.E-Mail Address') }} </label>
            <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($admin) ? $admin->email : old('email') }}"  placeholder="" autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <span>{{old('email')}}</span>
                <strong>{{ $message }}</strong>
               
            </span>
            @enderror
        </div>

       
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="password">{{ __('labels.Password') }} </label>
                <input required id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="" value="{{ isset($client) ? $client->user->password : '' }}"  autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="col-sm-6">

                <label for="password-confirm">{{ __('labels.Confirm Password') }} </label>
                <input required id="password-confirm" type="password" class="form-control " name="password_confirmation"  placeholder="" value="{{ isset($client) ? $client->user->password : '' }}" autocomplete="new-password">

            </div>
        </div>
        


    </div>

</div>


