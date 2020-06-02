function printPaganti(paganti){
  var target = $('#list');
  var template = $('#pagante-template').html();
  var compiled = Handlebars.compile(template);

  for (var pagante of paganti){
    var paganteHTML = compiled(pagante);
    target.append(paganteHTML);
  }
}

function getPaganti(){
  $.ajax({
    url: 'getPaganti.php',
    method: 'GET',
    success: function(data){
      printPaganti(data);
    },
    error: function(err){
      console.log(err);
    }
  })
}

function deletePagante(){
  var self = $(this);
  var id = self.parent().data('id');
  $.ajax({
    url: 'deletePaganti.php',
    method: 'POST',
    data: {
      'id': id
    },
    success: function(){
      self.parent().fadeOut('slow', function(){
        self.parent().remove();
      })
    },
    error: function(err){
      console.log(err);
    }
  })
};

function init(){
  getPaganti();
  $('#list').on('click', '.delete', deletePagante);
}

$(document).ready(init);
