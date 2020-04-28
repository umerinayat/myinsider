

<!-- Project Details -->
<div class="card border-light">
    <h5 class="card-header">{{ __('labels.Project Details') }}:</h5>
    <div class="card-body">
        <div class="form-group">
            <!-- project_name -->
          
    
                <label for="project_name"> {{ __('labels.Project Name') }}</label>
                <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" value="{{ isset($project) ? $project->project_name : old('project_name')  }}" required placeholder="" autocomplete="project_name" autofocus>

                @error('project_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            

        </div>

        <div class="form-group">
                <!-- project_description  -->
                <label for="project_description"> {{ __('labels.Project Description') }}</label>
                <textarea id="project_description"  class="form-control @error('project_description') is-invalid @enderror" name="project_description" value="{{ isset($project) ? $project->project_description : old('project_description')  }}" required placeholder="" autocomplete="project_description" autofocus>{{ isset($project) ? $project->project_description : old('project_description')  }}</textarea>

                @error('project_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row">
                <div class="col-sm-12">

                @php 

                    if (isset($project)) {
                        $loc = str_replace('_', '-', app()->getLocale());

                        $startDate = date_create($project->project_start_date);

                        if ($loc === 'de') {
                            
                            $startDate = date_format($startDate ,"d.m.Y H:i");

                        
                        } else if ($loc === 'en') {
                            $startDate = date_format($startDate ,"Y-m-d H:i");
                        }

                        if (isset( $project->project_end_date ))
                        {

                            $endDate = date_create($project->project_end_date);
                            if ($loc === 'de') {
                                $endDate = date_format($endDate ,"d.m.Y H:i");
                        } else if ($loc === 'en') {
                        
                            $endDate = date_format($endDate ,"Y-m-d H:i");
                        }
                            

                        } else {
                        $endDate = '';
                        }
                    }
                   
                @endphp

                

                <label for="project_start_date"> {{ __('labels.Start Date') }}</label>

                    <input required name="project_start_date" type="text" class="form-control  flatpickr-input  datep" required placeholder="{{ __('labels.Select Start Date') }}" readonly="readonly" value="{{ isset($project) ? $startDate  : old('project_start_date') }}"/>
                    <small class="form-text text-muted">{{ __('labels.The start date for the Project.') }}</small>


                @error('project_start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                
                </div>

               

            </div>

        
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_project_completed" id="is_project_completed"  {{ ((isset($project) && $project->is_project_completed === 1)) ? 'checked' : NULL }}>
                
                
                <label class="form-check-label" for="is_project_completed">
                     {{ __('labels.Is Project Completed?') }}
                </label>
            </div>
        </div>

        <div class="form-group row">
        <div class="col-sm-12" id="project_end_date">

            <label for="project_end_date">{{ __('labels.End Date') }}</label>
                <input name="project_end_date" id="end_date_picker"  type="text" class="form-control flatpickr-input datep" placeholder="{{ __('labels.Select End Date') }}" readonly="readonly" value="{{ isset($project) ? $endDate : ' '  }}"/>
                <small class="form-text text-muted">{{ __('labels.The End date for the Project.') }}</small>
            </div>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-outline-primary" id="commitBtn">{{ __('labels.Commit') }} ( <span id="commitLabel">NO</span> ) </button>
        </div>
        <input type="hidden" name="commit" id="commitTextField" value="{{ isset($project) ? $project->commit : 'no'  }}" />
  
    </div>
</div>

<!-- Company Details -->
<div class="card border-light mb-3">
    <h5 class="card-header">{{ __('labels.Add Insiders To Project') }}:</h5>

    <div class="card-body">
        
        <div class="form-group">
            <select  id="multiple-insider-select" name="insiders[]" multiple class="from-control" style="width:100%">
                @foreach($insiders as $insider)
                
                    <option value="{{$insider->id}}" {{ $insider->isPartOfProject ? 'selected' : '' }}>{{ __('auth.' .$insider->title) .' '. $insider->user->first_name .' '. $insider->user->last_name }}</option>
                
                @endforeach
            </select>
            @error('insiders')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_send_project_info" id="is_send_project_info" >
                
                
                <label class="form-check-label" for="is_send_project_info">
                     {{ __('labels.Send project information to all added insiders by E-mail?') }}
                </label>
            </div>
        </div>

        @if (Route::currentRouteName() === 'projects.edit') 
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_send_project_info_new" id="is_send_project_info_new" >
                
                <label class="form-check-label" for="is_send_project_info_new">
                     {{ __('labels.Send project information to newly added insiders by E-mail?') }}
                </label>
            </div>
        </div>
        @endif
       
       
    </div>

</div>

