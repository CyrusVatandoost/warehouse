<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'About Us')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
	<style>
	

	</style>
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->
  
 

 <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h1 class="mb-4 text-black">Benefits and features</h1>
          <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor iaculis purus. In egestas nisi mauris, convallis accumsan ipsum elementum a. Curabitur aliquam viverra egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam viverra vel felis ac iaculis. Fusce malesuada luctus odio vitae semper. Nunc imperdiet tempus ullamcorper. Pellentesque vehicula, turpis id ullamcorper ornare, urna velit luctus lacus, et hendrerit erat ex ac ex. Donec ac dui bibendum, auctor nulla a, finibus sem. Pellentesque at cursus urna. Suspendisse congue, dolor vel sagittis consectetur, mauris nisl ullamcorper odio, eget ultrices diam lectus in sapien.</p>
          <div class="row text-left mt-5">
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-12">
                  <h5 class="text-secondary"><b>For the community</b></h5>
                </div>
              </div>
              <p>Nullam blandit bibendum ornare. Etiam imperdiet leo nisl. Vivamus volutpat ante quam, sit amet luctus nisl venenatis vel. Vivamus eget leo eu erat accumsan posuere quis nec turpis. Phasellus luctus convallis imperdiet. Nunc eget pharetra diam. Curabitur eleifend mi id rhoncus egestas. Curabitur in felis quis metus accumsan tristique. Donec consectetur urna nunc, at dignissim ex vulputate vitae. Praesent et nunc ipsum. Pellentesque sed dolor eget magna rutrum hendrerit.</p>
            </div>
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-12">
                  <h5 class="text-secondary"><b>For the school</b></h5>
                </div>
              </div>
              <p>Nullam blandit bibendum ornare. Etiam imperdiet leo nisl. Vivamus volutpat ante quam, sit amet luctus nisl venenatis vel. Vivamus eget leo eu erat accumsan posuere quis nec turpis. Phasellus luctus convallis imperdiet. Nunc eget pharetra diam. Curabitur eleifend mi id rhoncus egestas. Curabitur in felis quis metus accumsan tristique. Donec consectetur urna nunc, at dignissim ex vulputate vitae. Praesent et nunc ipsum. Pellentesque sed dolor eget magna rutrum hendrerit.</p>
            </div>
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-12">
                  <h5 class="text-secondary"><b>For the greater good</b></h5>
                </div>
              </div>
              <p>Nullam blandit bibendum ornare. Etiam imperdiet leo nisl. Vivamus volutpat ante quam, sit amet luctus nisl venenatis vel. Vivamus eget leo eu erat accumsan posuere quis nec turpis. Phasellus luctus convallis imperdiet. Nunc eget pharetra diam. Curabitur eleifend mi id rhoncus egestas. Curabitur in felis quis metus accumsan tristique. Donec consectetur urna nunc, at dignissim ex vulputate vitae. Praesent et nunc ipsum. Pellentesque sed dolor eget magna rutrum hendrerit.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
@endsection