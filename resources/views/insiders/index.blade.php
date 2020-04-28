@extends('layouts.master')

@section('extra-head')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('page-title')
    {{ __('labels.Insiders') }}
@endsection

@section('main-content')

          <!-- DataTales Insiders -->
          <div class="card shadow mb-4">
            
          <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">{{ __('labels.Insiders') }}</h1>
                
                <a href="{{ route('insiders.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-circle fa-sm"></i>
                    </span>
                    <span class="text"> {{__('labels.Add Insider')}} </span>
              </a>  

              </div>
            </div>
            
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableInsider" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('labels.Title') }}</th>
                      <th>{{ __('labels.First Name') }}</th>
                      <th>{{ __('labels.Last Name') }}</th>
                      <th>{{ __('labels.Email') }} </th>
                  
                     
                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>#</th>
                      <th>{{ __('labels.Title') }}</th>
                      <th>{{ __('labels.First Name') }}</th>
                      <th>{{ __('labels.Last Name') }}</th>
                      <th>{{ __('labels.Email') }} </th>
                    
                      
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

$(document).ready(function() {

var appLocale = $('#appLocale').val();
if (appLocale === 'en') {

  $('#dataTableInsider').DataTable({
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


  $('#dataTableInsider').DataTable({
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