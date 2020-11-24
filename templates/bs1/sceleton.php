<!doctype html>
<html lang="en">

<head>
  <title>Рюкзаки в Украине</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="tpl/t1/lib/bootstrap.css">
  <link rel="stylesheet" href="tpl/t1/lib/jquery-ui.css">
  <link rel="stylesheet" href="tpl/t1/lib/jquery.auto-complete.css">
  <link rel="stylesheet" href="tpl/t1/t1.css">
  <!--link rel="stylesheet" href="tpl/t1/dashboard.css"-->
  <!-- Custom styles for this template -->
</head>

<body class="bg-light">

<?php require_once 'navbar.php'?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-3 col-xl-2 pr-0">
      <?require_once 'sidebar.php'?>
    </div>
    <div class="col-12 col-md-9 col-xl-10">
      <?require_once myConf::get('main').'.php'?>
    </div>
  </div>
</div>


<script src="tpl/t1/lib/jquery-3.2.1.js"></script>
<script src="tpl/t1/lib/jquery-ui.js"></script>
<script src="tpl/t1/lib/popper.js"></script>
<script src="tpl/t1/lib/bootstrap.js"></script>
<script src="tpl/t1/lib/jquery.auto-complete.js"></script>


<script>

$('input[name="myq"]').autoComplete({
    minChars: 2,
    source: function(term, response){
        $.getJSON('_mySearch.php', { myq: term }, function(data){ response(data); });
    },
    menuClass: '', // Для text-wrap (также чтобы заработало нужно править css)
    renderItem: function (item, search){
        // escape special characters
        search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
        var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
        return '<div class="autocomplete-suggestion" data-val="' + item + '">' + item.replace(re, "<b>$1</b>") + '</div>';
    },
});

$( function() {
  $( "#slider-range" ).slider({
    range: true,
    min: <?=myConf::get('started_price_from')?>,
    max: <?=myConf::get('started_price_to')?>,
    values: [ <?=myURL::get('price_from')?>, <?=myURL::get('price_to')?> ],
    slide: function( event, ui ) {
      $( "#slider_price" ).val( ui.values[ 0 ] + " грн - " + ui.values[ 1 ] + " грн" );
      $( ":input[name='price_from']" ).val(ui.values [0]);
      $( ":input[name='price_to']" ).val(ui.values [1]);
    },
    change: function( event, ui ) {
      $("#filters").submit();
    },
  });
  $( "#slider_price" ).val( $( "#slider-range" ).slider( "values", 0 ) +
    " грн - " + $( "#slider-range" ).slider( "values", 1 ) + " грн" );
} );

$("#category<?=myURL::get('category')?>").addClass("active");
$("#category<?=myURL::get('category')?>").parent().parent().addClass("active");

$("input[type=checkbox]").click(function () {
  $("#filters").submit();
});

</script>

</body>
</html>