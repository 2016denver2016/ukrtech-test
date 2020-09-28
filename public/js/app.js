$(document).ready(function () {

    $('.btn-delete').on('click', function (e) {
        e.preventDefault()

        let id = $(this).attr("data-id");

        console.log(id);

        $.ajax({
            url: '/binar/cell/delete',
            type: 'POST',
            data: { id },
            success: res => {
                // console.log(${res} );
                // let obj = JSON.parse(res);
                location.replace(`/binar`)
            },
        });
    })

    
    $("#myForm").submit(function () {
        
        let form_data = $(this).serialize();     
        
        $.ajax({
            url: "/binar/create-cell",
            type: "POST",            
            data: form_data,
            
            success: function () {
                location.replace(`/binar`)
            }, 
           
        });
    });
    
    
    
});
