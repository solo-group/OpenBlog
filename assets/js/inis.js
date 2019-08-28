$(document).ready(function(){
  $('.slider').slider();
  $('.modal').modal();
  $('.tabs').tabs({
    swipeable:true
  });

  $('.datepicker').datepicker({
    format: 'd mmm yyyy'
  });
   $('select').formSelect();

  $('#carousel-next').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $('.slider').slider('next');
});
$('.phonebavT').dropdown();
$('#carousel-prev').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $('.slider').slider('prev');
});
});
