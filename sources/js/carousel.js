function init()
{
    var list = new Array("sources/images/header1.jpg","sources/images/header1.jpg","sources/images/header1.jpg");
    var current = 0;
    $('#next').on('click', function()
    {
        current++;
        if (current >= list.length)
            current = 0;
        $('#image').attr('src', list[current]);
    });
    $('#previous').on('click', function()
    {
        current--;
        if (current < 0)
            current = list.length - 1;
        $('#image').attr('src', list[current]);
    });
    var interval= setInterval (function()
{
    current++;
    if(current>=list.length)
    current=0;
    $("#image").attr("src",list[current]);

},3000);

    $('#image').mouseenter(function()
     {
    clearInterval(interval);
    });
  $('#image').mouseout(function()
    {
           interval= setInterval (function()
{
    current++;
    if(current>=list.length)
    current=0;
    $("#image").attr("src",list[current]);

},3000);  
    });
   
}

init();




 

