<!doctype html>
<html lang="en">
  <!-- header.blade.php -->
  @include('layout.header')
  <!-- for modals -->
  @yield('modals')

  <body>
    <!-- top-navbar.blade.php -->
    @include('layout.top-navbar')
    <!-- body.blade.php -->
    @include('layout.body')
    <!-- footer.blade.php -->
    @include('layout.footer')

    <!-- JS -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--> <!--slim version of javascript doesn't work with autocomplete -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{!! asset('js/jquery.easy-autocomplete.min.js') !!}"></script>
    <script>
    var projects = {
    url: "/searchproject/json",
    getValue: function(element) {
      return element.pName+" | "+element.username;
    },
    list: {
      match: {
        enabled:true
      },
      showAnimation: {
        type: "slide", //normal|slide|fade
        time: 400,
        callback: function() {}
      },
      hideAnimation: {
        type: "slide", //normal|slide|fade
        time: 400,
        callback: function() {}
      },
      onClickEvent: function() {
        $projectID = $("#search-project").getSelectedItemData().pID;
        window.location = "/project/" + $projectID;
      }
    }
  };

  $("#search-project").easyAutocomplete(projects);
  </script>
<!-- for custom scripts -->
    @yield('scripts')
  </body>
</html>
