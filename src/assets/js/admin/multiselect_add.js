$(function(){

    var modal = function(button){
        return button.parentNode.parentNode.parentNode.parentNode;
    }

    var form = {
        data: [],
        modal: null,
        texts: function(){
            texts = $( form.modal ).find('input[type="text"]');
            for (var i = 0; i < texts.length; i++) {
                name = texts[i].name;
                value = texts[i].value;
                form.data.push({name: value});
            }
        },
        checkboxs: function(){
            return $( form.modal ).find('input[type="checkbox"]');
        },
        textareas: function(){
            return $( form.modal ).find('textarea');
        }
    }

    var getDataForm = function(){
        if(form.modal === null)
          throw 'No ha seleccionado una ventana modal';
        form.texts();
        form.checkboxs();
        form.textareas();
        console.log(form.data);
    }

    var enviar = function(e){
        console.log(modal(this));
        form.modal=modal(this);
        console.log( getDataForm() );
    };

    var submits = document.getElementsByClassName('submit');

    for (var i = 0; i < submits.length; i++) {
        submits[i].addEventListener('click', enviar);
    }

});
