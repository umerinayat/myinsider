@extends('layouts.master')


@section('page-title')
  Project - {{ $project->project_name }}
@endsection

@section('extra-head')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('main-content')


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Project Details') }}:</h1>

      @if($project->commit === 'no')
      <a href="{{ route('projects.edit', ['project' => $project]) }}" class="d-none ml-auto  d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-edit fa-sm"></i>
        </span>
        <span class="text">  {{ __('labels.Edit') }} </span>
      </a>
      <form id="delete-form" action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST">
        @method('DELETE')
        @csrf

        <button id="deleteBtn" type="button" class="ml-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm btn-icon-split" title="Delete" value="DELETE">
          <span class="icon text-white-50">
            <i class="fas fa-trash fa-sm"></i>
          </span>
          <span class="text"> {{ __('labels.Delete') }} </span>
        </button>
      </form>
      @endif



    </div>
  </div>
  <div class="card-body" style="font-size:17px">

  <div class="row"  >
      <dt class="col-sm-2" >
         {{ __('labels.Name') }}
      </dt>
      <dd class="col-sm-4">
          {{ $project->project_name }}
      </dd>
  </div> 

  <div class="row mt-4">

    <dt class="col-sm-12">
     {{ __('labels.Description') }}
    </dt>
    <dd class="col-sm-12 mt-3">
        <p>{{  $project->project_description }}</p>
    </dd>

  </div>

  @php 

$loc = str_replace('_', '-', app()->getLocale());

$startDate = date_create($project->project_start_date);

if ($loc === 'de') {
    $startDate = date_format($startDate ,"d.m.Y H:i");

    $isCompleted = $project->is_project_completed ? 'Ja' : 'Nein';
    $isCommitted = $project->commit === 'yes' ? 'Ja' : 'Nein';

} else if ($loc === 'en') {
    $startDate = date_format($startDate ,"Y-m-d H:i");
    $isCompleted = $project->is_project_completed ? 'YES' : 'NO';
    $isCommitted = $project->commit === 'yes' ? 'YES' : 'NO';
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
$endDate = '_________';
}
@endphp

  <div class="row">
      <dt class="col-sm-2">
        {{ __('labels.Start Date') }}
      </dt>
      <dd class="col-sm-4">
          {{ $startDate }}
      </dd>
  </div> 

  <div class="row mt-3">
      <dt class="col-sm-2">
        {{ __('labels.End Date') }}
      </dt>
      <dd class="col-sm-4">
          {{ $endDate }}
      </dd>
  </div> 

  <div class="row mt-3">
      <dt class="col-sm-2">
        {{ __('labels.Is Completed?') }}
      </dt>
      <dd class="col-sm-4">
          {{  $isCompleted }}
      </dd>
  </div>

  <div class="row mt-3">
      <dt class="col-sm-2">
       {{ __('labels.Is Committed?') }}
      </dt>
      <dd class="col-sm-4">
          {{  $isCommitted }}
      </dd>
  </div>



  </div>
</div>

<div class="card shadow mb-4">

  <div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Insiders those are added to the project') }}:</h1>
    </div>
  </div>

  <div class="card-body">


  <div class="table-responsive">
                <table class="table table-bordered" id="dataTableProjectsIns" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('labels.Title') }}</th>
                      <th>{{ __('labels.First Name') }}</th>
                      <th>{{ __('labels.Last Name') }}</th>
                      <th>{{ __('labels.Email') }}</th>

                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>#</th>
                      <th>{{ __('labels.Title') }}</th>
                      <th>{{ __('labels.First Name') }}</th>
                      <th>{{ __('labels.Last Name') }}</th>
                      <th>{{ __('labels.Email') }}</th>

                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>

                   @for($i = 0; $i < count($insiders); $i++)
                    <tr>
                        <td class="pt-4">{{ $i + 1 }}</td>
                        <td class="p-4">{{  __('auth.'.$insiders[$i]->title) }}</td>
                        <td class="p-4">{{ $insiders[$i]->user->first_name }}</td>
                        <td class="p-4">{{ $insiders[$i]->user->last_name }}</td>
                        <td class="p-4">{{ $insiders[$i]->user->email }}</td>

                        <td class="p-4"> <a href="{{ route('insiders.show', ['insider' => $insiders[$i]->id]) }}" class=" p-0 m-0">{{ __('labels.View') }}</a> ,<a href="{{ route('insiders.edit', ['insider' => $insiders[$i]->id]) }}" class=" p-0 m-0"> {{ __('labels.Edit') }} </a></td>
                        
                    </tr>
                    @endfor

                  </tbody>
                </table>
              </div>

    

  </div>
</div>


@endsection

@section('extra-script')
    <!-- Custom scripts for this page -->

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->



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
                    $('#delete-form').submit();
                } else {
                    //
                }
            });
        });


        $(document).ready(function() {

var appLocale = $('#appLocale').val();
if (appLocale === 'en') {

  $('#dataTableProjectsIns').DataTable({
    language: {
       //

      "decimal":        "",
      "emptyTable":     "No data available in table",
      "info":           "Showing _START_ to _END_ of _TOTAL_ Insiders",
      "infoEmpty":      "Showing 0 to 0 of 0 Insiders",
      "infoFiltered":   "(filtered from _MAX_ total Insiders)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Show _MENU_ Insiders",
      "loadingRecords": "Loading...",
      "processing":     "Processing...",
      "search":         "Search:",
      "zeroRecords":    "No matching records found",
      "paginate": {
          "first":      "First",
          "last":       "Last",
          "next":       "Next",
          "previous":   "Previous"
      },
      "aria": {
          "sortAscending":  ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
      }
              //
    }
  });

  // 
} else if (appLocale === 'de') {


  $('#dataTableProjectsIns').DataTable({
    language: {
      //
      "decimal":        "",
      "emptyTable":     "Keine Daten in der Tabelle verfügbar",
      "info":           "Zeige _START_ bis _END_ von _TOTAL_ Insidern",
      "infoEmpty":      "Zeige 0 bis 0 von 0 Insidern",
      "infoFiltered":   "(filtered from _MAX_ total Insidern)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Show _MENU_ Insider",
      "loadingRecords": "Loading...",
      "processing":     "Processing...",
      "search":         "Suche:",
      "zeroRecords":    "Keine übereinstimmenden Aufzeichnungen gefunden",
      "paginate": {
          "first":      "Zuerst",
          "last":       "Zuletzt",
          "next":       "Nächste",
          "previous":   "Letzte"
      },
      "aria": {
          "sortAscending":  ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
      }
      //
    }
  });

}
});

  
  </script>
    
@endsection