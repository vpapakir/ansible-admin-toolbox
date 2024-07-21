jQuery(document).ready(function($){
    $('#customizer_reset_btn button').on( 'click', function(e){
       e.preventDefault();
       
       var data = {
			wp_customize: 'on',	
			action: 'customizer_reset',
            nonce: Cookery_Reset.nonce
        };

        $.confirm({
		    title: Cookery_Reset.title,
		    content: Cookery_Reset.content,
		    type: 'red',
		    typeAnimated: true,
		    icon: 'fas fa-skull-crossbones',
		    autoClose: 'no|15000',
            buttons: {
		        yes: {
		            isHidden: true, // hide the button
		            keys: ['y'],
		            action: function () {
		                $.post(ajaxurl, data, function (e) {
                            wp.customize.state('saved').set(true);
                            location.reload();
                        });
		            }
		        },
		        no: {
		            keys: ['N'],
                    btnClass: 'btn-blue',
		            action: function () {
		                //$.alert('You clicked No.');
		            }
		        },
			}
		});
    });        
});