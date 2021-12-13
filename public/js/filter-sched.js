    $( ".filter" ).change(function() {
        $('.subcontainer').hide();
        switch($('.filter').val()){
            case 'ALL':
                $('#all').show();
                break;
            case 'OPEN':
                $('#open').show();
                break;
            case 'CLOSED':
                $('#closed').show();
                break;
            case 'ARRIVED':
                $('#arrived').show();
                break;
        }
        
    });  