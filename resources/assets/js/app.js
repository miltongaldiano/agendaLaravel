
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/*window.Vue = require('vue');*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});*/
$("#cep").on('change', function(){
	var cep_code = $(this).val();
	$.ajax({
	  url: "https://viacep.com.br/ws/"+cep_code+"/json",
	}).done(function(result) {
	  	$('#cidade option[data-value='+result.ibge+']').attr('selected','selected');
	  	$('#endereco').val(result.logradouro);
	  	$('#numero').val(result.numero);
	  	$('#bairro').val(result.bairro);
	});

});

/*$("#cep").on('change', function(){
  var cep_code = $(this).val();
  if( cep_code.length <= 0 ) return;
  $.get("https://viacep.com.br/ws/"+cep_code+"/json",
     function(result){
        if( result.status!=1 ){
           alert(result.message || "Houve um erro desconhecido");
           return;
        }
        $("input#cep").val( result.code );
        $("select#cidade").val( result.ibge );
        $("input#bairro").val( result.district );
        $("input#endereco").val( result.address );
     });
});*/