@extends('layout.app')

@section('title', $project->name)

@section('left-sidebar')
  <p><a href="#modal-container-delete-project" role="button" class="btn btn-danger btn-block" data-toggle="modal">Delete Project</a></p>
	@endsection

@section('body')

  <div class="tabbable" id="tabs-463690">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#panel-summary" data-toggle="tab">Abstract</a>
      </li>
      <li>
        <a href="#panel-files" data-toggle="tab">Files</a>
      </li>
      <li>
        <a href="#panel-progress" data-toggle="tab">Progress</a>
      </li>
      <li>
        <a href="#panel-issues" data-toggle="tab">Issues</a>
      </li>
      <li>
        <a href="#panel-settings" data-toggle="tab">Settings</a>
      </li>
    </ul>
    <div class="tab-content">

      <div class="tab-pane active" id="panel-summary">
        <br>
        <div class="jumbotron">
          <h2>
            Hello, world!
          </h2>
          <p>
            This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
          </p>
          <p>
            <a class="btn btn-primary btn-large" href="#">Learn more</a>
          </p>
        </div>
      </div>

      <div class="tab-pane" id="panel-files">
        <table class="table">
          <thead>
            <tr>
              <th>#<th>Product<th>Payment Taken<th>Status
          </thead>
          <tbody>
            <tr>
              <td>1
              <td>TB - Monthly
              <td>01/04/2012
              <td>Default
            <tr class="active">
              <td>1
              <td>TB - Monthly
              <td>01/04/2012
              <td>Approved
            <tr class="success">
              <td>2
              <td>TB - Monthly
              <td>02/04/2012
              <td>Declined
            <tr class="warning">
              <td>3
              <td>TB - Monthly
              <td>03/04/2012
              <td>Pending
            <tr class="danger">
              <td>4
              <td>TB - Monthly
              <td>04/04/2012
              <td>Call in to confirm
          </tbody>
        </table>
      </div>

      <div class="tab-pane" id="panel-progress">
        <br>
        <div class="progress progress-striped">
          <div class="progress-bar progress-success">
          </div>
        </div>
        <h2>
          Heading
        </h2>
        <p>
          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
        </p>
        <p>
          <a class="btn" href="#">View details »</a>
        </p>
      </div>

      <div class="tab-pane" id="panel-issues">
        <p>
          <div class="jumbotron">
            <h2>
              Hello, world!
            </h2>
            <p>
              This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
            </p>
            <p>
              <a class="btn btn-primary btn-large" href="#">Learn more</a>
            </p>
          </div>
        </p>
      </div>

      <div class="tab-pane" id="panel-settings">
        <p>
          Settings
        </p>
      </div>

    </div>
  </div>

	@endsection

@section('right-sidebar')
  <div class="well">
    <p>ADS</p>
  </div>

  <div class="well">
    <p>ADS</p>
  </div>

	@endsection

@include('modals.delete_project')