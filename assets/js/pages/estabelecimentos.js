$(document).ready(function(){
    $('.cnpj').mask('99.999.999/9999-99', {placeholder: "__.___.___/____-__"});
    $('.telefone').mask('(00)0000-00009', {placeholder: "(__)____-____"});   
    $('.numero_logradouro').mask('999');
    $('.data').mask('99/99/9999', {placeholder: "__/__/____"});
    
    $.validator.addMethod("validaCNPJ", function(cnpjM){
        var cnpj = cnpjM.replace(/[^0-9]/g, '');
        
        //CNPJ incompleto
        if(cnpj.length != 14) return false;
        
        var i;
        var soma = 0;
        var d;
        
        //Dígitos multiplicadores para conferir o dígito verificador
        var alg = [5,4,3,2,9,8,7,6,5,4,3,2];
        
        for(i = 0; i < 12; i++){
            soma += cnpj[i] * alg[i];
        }
        
        //Verifica dígito calculado
        d = (soma%11 < 2) ? 0 : 11 - (soma%11);
        if(d != cnpj[12]) return false;
        
        //Adiciona outro digito multiplicador e zera o somatorio
        alg.unshift(6);
        soma = 0;
        
        for(i = 0; i < 13; i++){
            soma += cnpj[i] * alg[i];
        }
        
        //Verifica ultimo dígito
        d = (soma%11 < 2) ? 0 : 11 - (soma%11);
        if(d != cnpj[13]) return false;
        
        //CNPJ válido
        return true;
    },'CNPJ invalido.');
    
    jQuery.validator.addMethod("validaData",
        function(value, element) {
            if (value.length > 0){
            
                try { 
                    var d = value.split("/");
                    return !(new Date(d[2]+"-"+d[1]+"-"+d[0]) == 'Invalid Date'); 
                }
                catch(e) { 
                    return false;
                }
            }
            return true;
        },
        "Data inválida."
    );
    
    $.validator.addMethod("verificaCategoria", function(val){

        var categoria = $("#categoria").val();
          
        if((val.length < 13) && (categoria == 1)){
            return false;
        }
            
        return true;
    },'Este campo é obrigatório.');
    
    $.validator.addMethod("validaTel", function(val){
        
        if(val.length == 0){
            return true;
        }
        if(val.length < 13) {
            return false;
        }
        return true;
    },'Telefone invalido.');
    
    $.validator.addMethod("validaEmail", function(val){
        
        if (val.length == 0){
            return true;
        }
        var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.\n\[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!val.match(regex)){
            return false;
        }       
        return true;
	
    },'Email inválido.');
       
    $("#formEstabelecimentos").validate( {
        onkeyup: false,
        errorClass: 'text-danger',
        validClass: 'text-success',
        highlight: function (element) {
            $(element).closest('.form-group').removeClass("has-success");
            $(element).closest('.form-group').addClass("has-error");
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass("has-error");
            $(element).closest('.form-group').addClass("has-success");
        },
        errorPlacement: function (error, element) {
            $(element).closest('.form-group').append(error);
        },
        rules: {
            razao_social: {
               required: true
           },
           cnpj : {
               required: true,
               validaCNPJ: true
           },
           email : {
               validaEmail: true
           },
           telefone: {
               validaTel: true,
               verificaCategoria: true
           },
           data_registro: {
               validaData: true
           }
        }, messages: {
            razao_social: {
                required: 'Este campo é obrigatório.'
            },
            cnpj: {
                required: 'Este campo é obrigatório.'
            }
        }
    });
    
    $('.excluir').click(function(e){
        
        e.preventDefault();
        
        $('#confirma').attr('href',$(this).attr('href'));
        
        $('#Exclusao').modal('show');
        
    });
    
$('#loadCidade').hide();
var url_ajax = $("#urlCidadeAjax").val();    

function getCidade(estado, cidade, load) {

    $(cidade).hide();
    $(load).show();

    $(cidade).load(url_ajax, {uf: estado}, function(){

        $(load).hide();
        $(cidade).show();
    });

}
    
$('#estado').change(function() {

    getCidade($(this).val(), '#cidade', '#loadCidade');

});
    
});