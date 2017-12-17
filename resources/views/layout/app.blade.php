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
    <!-- bootstrap 4.0 -->
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

    <!-- script to keep to same tab after refresh -->
    <script>
      if (location.hash) {
        $('a[href=\'' + location.hash + '\']').tab('show');
      }
      var activeTab = localStorage.getItem('activeTab');
      if (activeTab) {
        $('a[href="' + activeTab + '"]').tab('show');
      }

      $('body').on('click', 'a[data-toggle=\'tab\']', function (e) {
        e.preventDefault()
        var tab_name = this.getAttribute('href')
        if (history.pushState) {
          history.pushState(null, null, tab_name)
        }
        else {
          location.hash = tab_name
        }
        localStorage.setItem('activeTab', tab_name)

        $(this).tab('show');
        return false;
      });
      $(window).on('popstate', function () {
        var anchor = location.hash ||
          $('a[data-toggle=\'tab\']').first().attr('href');
        $('a[href=\'' + anchor + '\']').tab('show');
      });
    </script>

    <!-- for custom scripts -->
    @yield('scripts')

  </body>
</html>
