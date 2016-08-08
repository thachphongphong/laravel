 function updateBooking(io){
    if(io == 'in'){
        $('#booking-checkin-txt').text( $('#booking-checkin').val());                  
    }else{
        $('#booking-checkout-txt').text($('#booking-checkout').val());
        if($('#booking-checkin').val() != ""){
            var price = $('#room-price').text();
            $('#booking-total-txt').text(days() * price);
        }
      
    }
}

function days() {
   var a = $('.input-group.mg-check-in').datepicker('getDate').getTime(),
    b = $('.input-group.mg-check-out').datepicker('getDate').getTime(),
    c = 24*60*60*1000,
    diffDays = Math.round(Math.abs((a - b)/(c)));
        return diffDays;
}