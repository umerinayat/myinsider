@extends('layouts.master')

@section('extra-head')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('page-title')
  {{__('labels.Clients')}}
@endsection

@section('main-content')

          <!-- DataTales Clients -->
          <div class="card shadow mb-4">
            
          <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">{{__('labels.Clients')}}</h1>
                
                <a href="{{ route('clients.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-circle fa-sm"></i>
                    </span>
                    <span class="text">  {{__('labels.Add Client')}} </span>
              </a>  

              </div>
            </div>
            
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableClient" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('labels.Title') }}</th>
                      <th>{{ __('labels.First Name') }}</th>
                      <th>{{ __('labels.Last Name') }}</th>
                      <th>{{ __('labels.Email') }}</th>
                     
                      <th>{{ __('labels.Is Active') }}</th>
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
                      
                      <th>{{ __('labels.Is Active') }}</th>
                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>

                   @for($i = 0; $i < count($clients); $i++)
                    <tr>
                        <td class="pt-4">{{ $i + 1 }}</td>
                        <td class="p-4">{{   __('auth.'.$clients[$i]->title) }}</td>
                        <td class="p-4">{{ $clients[$i]->user->first_name }}</td>
                        <td class="p-4">{{ $clients[$i]->user->last_name }}</td>
                        <td class="p-4">{{ $clients[$i]->user->email }}</td>
                       
                        <td class="p-4">{{ $clients[$i]->user->is_active ? 'YES' : 'NO' }}</td>

                        <td class="p-4"> <a href="{{ route('clients.show', ['client' => $clients[$i]->id]) }}" class=" p-0 m-0">{{__('labels.View')}}</a> , <a href="{{ route('clients.edit', ['client' => $clients[$i]->id]) }}" class=" p-0 m-0">{{__('labels.Edit')}} </a></td>
                        
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

        $('#dataTableClient').DataTable({
          language: {
             //

            "decimal":        "",
            "emptyTable":     "No data available in table",
            "info":           "Showing _START_ to _END_ of _TOTAL_ clients",
            "infoEmpty":      "Showing 0 to 0 of 0 clients",
            "infoFiltered":   "(filtered from _MAX_ total clients)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Show _MENU_ clients",
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


        $('#dataTableClient').DataTable({
          language: {
            //
            "decimal":        "",
            "emptyTable":     "Keine Daten in der Tabelle verfügbar",
            "info":           "Zeige _START_ bis _END_ von _TOTAL_ Kunden",
            "infoEmpty":      "Zeige 0 bis 0 von 0 Kunden",
            "infoFiltered":   "(filtered from _MAX_ total Kunden)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Show _MENU_ Kunden",
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