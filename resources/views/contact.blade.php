@extends('layout.app')

@section('title', 'Contact Us')

@section('left-sidebar')
  <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
  <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
  @endsection

@section('body')
  <p>
    <form>
      <table class="form">
        <tr>
          <td>Name:
          <td><input type="text" name="name" >
        <tr>
          <td>E-mail:
          <td><input type="text" name="email" >
        <tr>
          <td>Topic:
          <td><input type="text" name="topic">
        <tr>
          <td>Comment:
          <td><textarea name="comment" rows="6"></textarea>
        <tr>
          <td><input type="submit" value="Send">
          <td><input type="reset" value="Clear">
      </table>
    </form>
  </p>
  @endsection

@section('right-sidebar')
  <div class="well">
    <p>ADS</p>
  </div>

  <div class="well">
    <p>ADS</p>
  </div>

  @endsection
