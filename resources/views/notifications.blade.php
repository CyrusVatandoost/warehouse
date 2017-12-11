`@extends('layout.app')

<!-- title at tab -->
@section('title', 'Notifications')
<!-- title at body -->
@section('page-title', 'Notifications')

<!-- css styles -->
@section('style')
  <style>
    .py-5 {
      padding-top: 3rem !important; }

      .container {
  width: 100%;
  margin-right: auto;
  margin-left: auto;
  padding-right: 15px;
  padding-left: 15px; }
  @media (min-width: 576px) {
    .container {
      max-width: 540px; } }
  @media (min-width: 768px) {
    .container {
      max-width: 720px; } }
  @media (min-width: 992px) {
    .container {
      max-width: 960px; } }
  @media (min-width: 1200px) {
    .container {
      max-width: 1140px; } }


  .row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px; }

  </style>
@endsection

<!-- modals -->
@section('modals')

@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')
  <div class="py-5"><div class="container"><div class="row"><div class="col-md-12 border border-dark" style=""><table class="table">
    <tbody>
     @foreach($logs as $log) 
      <tr>
        <td>
          You {{ $log->user_action }}: {{ $log->action_details }} on {{ $log->created_at }}
        </td>
       @endforeach 
    </tbody>
  </table></div></div>

  
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection