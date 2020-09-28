$(document).ready(function () {

    // $('.btn-delete').on('click', function (e) {
    //     e.preventDefault()
    //     // let idFromParent = $(this).parents('#tmplt-lang')
    //     let parent_id = 4//idFromParent.length ? idFromParent.attr('data-template-id') : $('#tmplt-duplicate').attr('data-template-id')
    //     let position = 2//$(this).attr('data-template-lang')

    //     $.ajax({
    //         url: '/binar/create-cell',
    //         type: 'POST',
    //         data: { parent_id, position },
    //         success: res => {
    //             // console.log(${res} );
    //             // let obj = JSON.parse(res);
    //             // location.replace(`/${obj.country}/${obj.lang}/templates/edit?id=${obj.id}`)
    //         },
    //     });
    // })

    
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
