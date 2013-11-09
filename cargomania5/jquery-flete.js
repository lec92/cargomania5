


$(document).ready(function() {
       $(".barco").hide();
       $(".avion").hide();
       $("#select_transport").change(function(){
           var $feeschedule1 = $(".barco");
           var $feeschedule2 = $(".avion");
           var select = $(this).find('option:checked').val();

            if (select == 'maritimo'){
    
                $feeschedule1.show();
            
            }else{
    
                $feeschedule1.hide();
            }
            if (select == 'aereo'){
    
                $feeschedule2.show();
            
            }else{
                $feeschedule2.hide();
            }

        });


    });