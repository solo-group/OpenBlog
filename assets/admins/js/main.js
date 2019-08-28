
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.fixed-action-btn').floatingActionButton({
        direction: 'left',
        hoverEnabled: false
        
    });
    $('.datepicker').datepicker();
    $('.materialboxed').materialbox();
    $('.modal').modal();

    
    
    $('#draggableBtn').draggable({containment: "parent"});
    $('select').formSelect();



     

  });

  function imagePreview(input) 
    {
      if (input.files && input.files[0]) 
      {
        var filerdr = new FileReader();
        filerdr.onload = function(e) {
            $('#preView').attr('src', e.target.result);
        };
        filerdr.readAsDataURL(input.files[0]);
      }
    }
