@extends('layouts.master')

@section('extra-head')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('page-title')
    {{ __('labels.Projects') }}
@endsection

@section('main-content')

          <!-- DataTales projects -->
          <div class="card shadow mb-4">
            
          <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">{{ __('labels.Projects') }}</h1>
                
                <a href="{{ route('projects.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-circle fa-sm"></i>
                    </span>
                    <span class="text"> {{ __('labels.Add Project') }}</span>
              </a>  

              </div>
            </div>
            
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableProjects" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('labels.Name') }}</th>
                      <th>{{ __('labels.Is Completed?') }}</th>
                      <th>{{ __('labels.Is Committed?') }}</th>
                      <th>{{ __('labels.Start Date') }}</th>
                      <th>{{ __('labels.End Date') }}</th>
                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>{{ __('labels.Name') }}</th>
                      <th>{{ __('labels.Is Completed?') }}</th>
                      <th>{{ __('labels.Is Committed?') }}</th>
                      <th>{{ __('labels.Start Date') }}</th>
                      <th>{{ __('labels.End Date') }}</th>
                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>

                   @for($i = 0; $i < count($projects); $i++)
                   @php 

                      $loc = str_replace('_', '-', app()->getLocale());

                      $startDate = date_create($projects[$i]->project_start_date);
                        if ($loc === 'de') {
                          $startDate = date_format($startDate ,"d.m.Y H:i");
                          $isCompleted = $projects[$i]->is_project_completed ? 'Ja' : 'Nein';
                          $isCommitted = $projects[$i]->commit === 'yes' ? 'Ja' : 'Nein';
                        } else if ($loc === 'en') {
                          $startDate = date_format($startDate ,"Y-m-d H:i");
                          $isCompleted = $projects[$i]->is_project_completed ? 'YES' : 'NO';
                          $isCommitted = $projects[$i]->commit === 'yes' ? 'YES' : 'NO';
                        
                        }



                      if (isset( $projects[$i]->project_end_date ))
                      {
                        $endDate = date_create($projects[$i]->project_end_date);
                        if ($loc === 'de') {
                          $endDate = date_format($endDate ,"d.m.Y H:i");
                        } else if ($loc === 'en') {
                          $endDate = date_format($endDate ,"Y-m-d H:i");
                        
                        }

                      } else {
                        $endDate = '___________';
                      }

                    @endphp
                    <tr>
                        <td class="pt-4">{{ $i + 1 }}</td>
                        <td class="p-4">{{ $projects[$i]->project_name }}</td>
                        <td class="p-4">{{ $isCompleted }}</td>
                        <td class="p-4">{{ $isCommitted }}</td>
                       
                        <td class="p-4">{{ $startDate }}</td>
                        <td class="p-4">{{ $endDate  }}</td>
                      
                        <td class="p-4"> <a href="{{ route('projects.show', ['project' => $projects[$i]->id]) }}" class=" p-0 m-0">{{ __('labels.View') }}</a>
                        @if($projects[$i]->commit === 'no')
                        , <a href="{{ route('projects.edit', ['project' => $projects[$i]->id]) }}" class=" p-0 m-0"> {{  __('labels.Edit')  }} </a></td>
                        @endif
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



$(document).ready(function() {

var appLocale = $('#appLocale').val();
if (appLocale === 'en') {

  $('#dataTableProjects').DataTable({
    language: {
       //

      "decimal":        "",
      "emptyTable":     "No data available in table",
      "info":           "Showing _START_ to _END_ of _TOTAL_ Projects",
      "infoEmpty":      "Showing 0 to 0 of 0 Projects",
      "infoFiltered":   "(filtered from _MAX_ total Projects)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Show _MENU_ Projects",
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


  $('#dataTableProjects').DataTable({
    language: {
      //
      "decimal":        "",
      "emptyTable":     "Keine Daten in der Tabelle verfügbar",
      "info":           "Zeige _START_ bis _END_ von _TOTAL_ Projekten",
      "infoEmpty":      "Zeige 0 bis 0 von 0 Projekten",
      "infoFiltered":   "(filtered from _MAX_ total Projekten)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Show _MENU_ Projekte anzeigen",
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