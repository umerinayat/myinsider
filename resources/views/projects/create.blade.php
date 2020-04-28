@extends('layouts.master')

@section('page-title')
    {{ __('labels.Create New Project') }}
@endsection

@section('extra-head')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection

@section('main-content')

<!-- DataTales projects -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h4 mb-0 text-gray-800"> {{ __('labels.Create New Project') }}</h1>
            <a href="{{ route('projects.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-users fa-sm"></i>
                </span>
                <span class="text"> {{ __('labels.All Projects') }} </span>
            </a>
        </div>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-lg-5"></div>
        </div>
        <form class="user" method="POST" action="{{ route('projects.store') }}">
            @csrf
            @include('projects.fields')

            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('labels.Add Project') }}
            </button>
            <hr>

        </form>
    </div>
</div>


@endsection

@section('extra-script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/de.js"></script>

    <script> 
        $("#multiple-insider-select").select2({
            placeholder: "{{ __('labels.Add Insiders') }}",
            allowClear: true,
        });

        // $(".datep").flatpickr({
        //     locale: "{{ str_replace('_', '-', app()->getLocale()) }}",
        //     enableTime: true,
        //     altInput: true,
        //     altFormat: "F j, Y",
        //     dateFormat: "Y-m-d H:i",
        // });

        var appLocale = $('#appLocale').val();

        var dateFormat = 'd-m-Y H:i';
        var altFormat = 'd. F Y H:i';
        

        if (appLocale === 'en') {
            dateFormat = 'Y-m-d H:i';
            altFormat = 'Y, F j H:i';
        } else if (appLocale === 'de') {
            dateFormat = 'd-m-Y H:i';
            altFormat = 'd. F Y H:i';
        }

        $(".datep").flatpickr({
            locale: "{{ str_replace('_', '-', app()->getLocale()) }}",
            time_24hr: true,
            enableTime: true,
            altInput: true,
            altFormat: altFormat,
            dateFormat: dateFormat,
        });

        // dd.mm.yyyy
        
        var projectEndDatePicker = $("#end_date_picker").flatpickr({
            locale: "{{ str_replace('_', '-', app()->getLocale()) }}",
            enableTime: true,
            time_24hr: true,
            altInput: true,
            altFormat: altFormat,
            dateFormat: dateFormat,
            onChange: function(selectedDates, dateStr, instance) {
                
                console.log(dateStr);
              
                if(dateStr !== '') {
                    $commitBtn.css('display', 'block');
                } else {
                    $commitBtn.css('display', 'none');
                }
            },
        });

        var $commitBtn = $('#commitBtn');
        $commitBtn.css('display', 'none');
       
        var commitLabelYes = '{{ __("labels.YES") }}' 

        var commitLabelNo = '{{ __("labels.NO") }}'

        var $isProjectCompCheckBox = $('#is_project_completed');
        var $commitTextField = $('#commitTextField');
        var $projectEndDate = $('#project_end_date');
        var $commitLabel = $('#commitLabel');


        $projectEndDate.css('display', 'none');

        $isProjectCompCheckBox.on('change', function (evt) {
            if ( $(this).prop('checked') ) {
                $projectEndDate.css('display', 'block');
             
            } else {
                $projectEndDate.css('display', 'none');
                $commitTextField.val('no');
                $commitLabel.text('NO');
                console.log($commitTextField.val());
                projectEndDatePicker.clear();
              
               
            }
        });

        $commitBtn.on('click', function (evt) {
            var commitModal = Swal.fire({
                title: '{{ __("labels.You will not be able to update this project again.") }}',
                text: '{{ __("labels.Really Commit?") }}',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: '{{ __("labels.NO") }}',
                cancelButtonColor: 'rgb(48, 133, 214)',
                confirmButtonColor: '#FA8072',
                confirmButtonText: '{{ __("labels.YES") }}',
                showConfirmButton: true,
            }).then((result) => {
                if (result.value) {
                  
                    $commitTextField.val('yes');
                    console.log($commitTextField.val());
                    $commitLabel.text(commitLabelYes);
                } else {
                    console.log('commit no');
                    $commitTextField.val('no');
                    console.log($commitTextField.val());
                    $commitLabel.text(commitLabelNo);
                }
            });
        });



      
    
        

    </script>
@endsection