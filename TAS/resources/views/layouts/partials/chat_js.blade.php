<script>
    
        $(document).ready(function() {
            //  pullData();
           
            
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });

         $.getJSON({

             url: '{{Route('store_session')}}',
             method: "POST",
             data: {},
             success: function (data) {

            //   console.log(data);

             }
         })

        });




     $('#mes_dt').keydown(function (e) {

        
         
     if (e.keyCode == 13) {
         
         var mes = $('#mes_dt').val();
         

         $('#mes_dt').val('');
        
      
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });

         $.getJSON({

             url: '{{Route('store_message')}}',
             method: "POST",
             data: {mes: mes},
             success: function (data) {

                 
                //  console.log(data);


             }
         })
        



     }
 });


function fetch_message(){


           
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }
             });


             $.getJSON({
                 url:'{{Route('chat_live')}}',
                 method:'POST',
                 data:{},
                 //dataType:'json',
                 success:function (data) {

                     if(data != ''){

                     }
                     // console.log(data);

                    //  $('#tb_sr_chat').html(data.mes_dt);
                    //  $('tb_sr_chat, div').animate({scrollTop:$(document).height()}, 'slow');
                     // window.scrollBy(0, 100);

                 }
             })

             // fetch_message();

             }

       

function pullData(){

  
fetch_message();


// setTimeout(pullData,2000);


}


     
     
</script>