<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>@yield('title')</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<!-- Google's Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="{{ asset('css/style.css') }}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/map.css') }}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/material-icons.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{!! asset('css/easy-autocomplete.min.css') !!}">



<script type="text/javascript">
  $(document).ready(function() {
  $(".expandable").on("click", ".add-more", function(e) {
    e.preventDefault();
    var rmButton = '<button class="btn btn-danger remove-me" type="button">-</button>';
    var grandParent = $(this).parent().parent();
    var countVal = grandParent.data("count");
    var count = parseInt(countVal);
    if (count == 1) {
      $(this).before(rmButton);
    }
    var toBeCopied = $(this).parent().clone();
    if (count == 1) { 
        var curClass = toBeCopied.find("input").attr('class');
        toBeCopied.find("input:first").attr('class', curClass + " offset-md-3");
        toBeCopied.find("label").remove();

    }
    var add_button = $(this).detach();
    grandParent.append(toBeCopied);
    count++;
    grandParent.data("count", count);
  });

  $(".expandable").on("click", ".remove-me", function(e) {
    e.preventDefault();
    var grandParent = $(this).parent().parent();
    var countVal = grandParent.data("count");
    count = parseInt(countVal);
    count--;
    grandParent.data("count", count);

    var nextButton = $(this).next("button");
    var prevButton = $(this).parent().prev().find("button");

    //When we click remove on the last entry:
    if (/add-more/.test(nextButton.attr("class")) && /remove-me/.test(prevButton.attr("class"))) {
      var add_button = nextButton.detach();
      $(this).parent().prev().find(".remove-me").after(add_button);
    }
    //When we click on the first entry:
    if ($(this).parent().children().is("label")) {
        secondEntry=$(this).parent().next().find("input");
        secondEntry.removeClass("offset-md-3");
        secondEntry.before($(this).parent().find("label"));
    }
    if (count == 1) {
      $(this).parent().prev().find(".remove-me").remove();
      $(this).parent().next().find(".remove-me").remove();
    }
    $(this).parent().remove();
    });

  });
</script>


<!-- JS for datepicker -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include date range picker -->
<script type-"text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<!-- insert css here -->
@yield('style')

</head>