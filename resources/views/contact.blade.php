@extends('layout.app')

@section('title', 'Contact Us')

@section('body')
  <p>
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-12">
        <h1 class="contact-title">Get in touch with us.</h1>
        <p class="subtitle">We appreciate all feedback we receive - positive and constructive - and love to hear what you think about our programmes and services.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
          <div class="map-form">
            <form class="card">
                <div class="form__row">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="material-icons material-icons-md">person</i></span>
                          <input type="text" class="input form__field" name="name" id="name" placeholder="Full Name" required>
                      </div>
                </div>
                <div class="form__row">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="material-icons material-icons-mid">email</i></span>
                          <input type="email" class="input form__field" name="email" id="email" placeholder="Email Address" required>
                      </div>
                </div>
                <div class="form__row">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons material-icons-mid">smartphone</i></span>
                      <input type="text" class="input form__field" name="phone" id="phone" placeholder="Phone Number" required>
                  </div>
                </div>
                <div class="form__row">
                  <span style="display:block;">
                      <i class="material-icons material-icons-mid">subject</i>
                      <span><label class="form__title" for="job-function">Subject</label></span>
                  </span>
                  <select class="form-control" name="job-function" required>
                    <option value="" selected="selected">Select a Subject</option> 
                    <option value="op1">Subject 1</option>
                    <option value="op2">Subject 2</option>
                    <option value="op3">Subject 3</option>
                    <option value="op4">Subject 4</option>
                  </select>
                </div>
                <div class="form__row">
                  <div class="input-group">
                      <span style="display:block;">
                        <i class="material-icons material-icons-mid">chat_bubble</i>
                        <span><label class="form__title">Message</label></span>
                      </span>
                  </div>
                  <textarea class="form__message" name="text" placeholder="Enter your message for us here. We will get back to you within 2 business days." required></textarea>
                </div>
                <div class="">
                    <button type="reset" value="Reset" name="reset" class="btn btn-reset reset float-left">Reset <i class="material-icons material-icons-mid">cached</i></button>
                    <button type="submit" class="form__submit btn btn-send float-right">Send <i class="material-icons material-icons-mid">near_me</i></button>
                </div>
              </form>
          </div>
      </div>
      <div class="col-sm-6">
        <br>
        <center>
        <h2 style="border-bottom: 1px solid black;">Contact Details</h2>
        <h3><i class="material-icons">place</i> Address</h3>
        <p>
          TE<sup>3</sup>D HOUSE<br>
          De La Salle University - Laguna Campus<br>
          LTI Spine Road, Laguna Blvd. Binan, Laguna
        </p>
        <div class="col-sm-6">
            <h3><i class="material-icons">phone</i> Telephone</h3>
            <p>(02) 809 7392</p>
        </div>
        <div class="col-sm-6">
          <h3><i class="material-icons">inbox</i></span> Email</h3>
          <p>inquire@te3dhouse.edu.ph</p>
        </div>
        <div class="embed-responsive embed-responsive-4by3">
         <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d240267.76398610455!2d120.8742572642568!3d14.416221499323498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7d7af18405ff%3A0x8d40985968975a91!2sDe+La+Salle+University+-+Laguna+Campus!5e0!3m2!1sen!2sph!4v1511289020122" width="350" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  </p>
  @endsection

