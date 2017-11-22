@extends('layout.welcome')

@section('title', 'Contact Us')

@section('body')
  <script>
      
      $(document).ready(function(){
        $(".input").focus(function () {
          $(this).closest('div').find(".clickable").removeClass('ph-big');
        }).blur(function () {
            if( !this.value ) {
              $(this).closest('div').find(".clickable").addClass('ph-big');
            }
        })
      });
</script>
  <p>
  <div class="container">
        <div class="row">
            <div class="col-md-7">
              <h1 class="title">Get in touch with us.</h1>
              <p class="subtitle">We appreciate all feedback we receive - positive and constructive - and love to hear what you think about our programmes and services. </p>
          </div>
        </div>
        <div class="row map-form">
            <div class="col-md-7">
                <form class="form">
                    <div class="form__row">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="material-icons">person</i></span>
                              <div class="clickable ph1 ph-small ph-big" id="test" data-input="name">Full Name</div>
                              <input type="text" class="input form__field" name="name" id="name" required>
                          </div>
                    </div>
                    
                    <div class="form__row">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="material-icons">email</i></span>
                              <div class="clickable ph2 ph-small ph-big" data-input="email">Email Adress</div>
                              <input type="email" class="input form__field" name="email" id="email" required>
                          </div>
                    </div>
                    
                    <div class="form__row">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="material-icons">smartphone</i></span>
                          <div class="clickable ph2 ph-small ph-big" data-input="phone">Phone Number</div>
                          <input type="text" class="input form__field" name="phone" id="phone" required>
                      </div>
                    </div>
                    
                    <div class="form__row">
                      <span style="display:block;">
                          <i class="material-icons">subject</i>
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
                          <i class="material-icons">chat_bubble</i>
                          <span><label class="form__title">Message</label></span>
                          
                          </span>
                      </div>
                      <textarea class="form__message" name="text" placeholder="Enter your message for us here. We will get back to you within 2 business days." required></textarea>
                    </div>
                    
                      <div class="">
                          <button type="submit" class="form__submit btn btn-info pull-right">Send <i class="material-icons">near_me</i></button>
                          <button type="reset" value="Reset" name="reset" class="btn">Reset <i class="material-icons">cached</i></button>
                      </div>
                  </form>
                </div>
            <div class="col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d240267.76398610455!2d120.8742572642568!3d14.416221499323498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7d7af18405ff%3A0x8d40985968975a91!2sDe+La+Salle+University+-+Laguna+Campus!5e0!3m2!1sen!2sph!4v1511289020122" width="500" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <h2>Contact Details</h2>
                <h3><legend><i class="material-icons">place</i> Address</legend></h3>
                <p>
                  TE <sup>3</sup>D HOUSE<br>
                De La Salle University - Laguna Campus<br>
                  LTI Spine Road, Laguna Blvd. Binan, Laguna</p>
                  <div class="col-md-5 col-sm-6" style="padding-left:0px;">
                      <h3><i class="material-icons">phone</i> Telephone</h3>
                      <p>(02) 809 7392</p>
                  </div>
                  <div class="col-md-5 col-sm-6" style="padding-left:0px;">
                      <h3><i class="material-icons">inbox</i></span> Email</h3>
                      <p>inquire@te3dhouse.edu.ph</p>
                  </div>
            </div>
        </div>
      </div>
  </p>
  @endsection

