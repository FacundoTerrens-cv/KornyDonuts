$(document).ready(function(){
    $('#donuts').on('click', function(){
      var search = $('#donuts').val()
      $.ajax({
        type: 'POST',
        url: '../front/search-user.php',
        data: {'search': search},
      })
      .done(function(resultado){
        $('#result').html(resultado)
      })
      .fail(function(){
        alert('Hubo un error :(')
      })
    })
    $('#empanadas').on('click', function(){
      var search = $('#empanadas').val()
      $.ajax({
        type: 'POST',
        url: '../front/search-user.php',
        data: {'search': search},
      })
      .done(function(resultado){
        $('#result').html(resultado)
      })
      .fail(function(){
        alert('Hubo un error :(')
      })
    })
    $('#all').on('click', function(){
      var search = $('#all').val()
      $.ajax({
        type: 'POST',
        url: '../front/search-user.php',
        data: {'search': search},
      })
      .done(function(resultado){
        $('#result').html(resultado)
      })
      .fail(function(){
        alert('Hubo un error :(')
      })
    })
  })
 
