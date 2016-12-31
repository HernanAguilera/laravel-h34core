H34.createNS('H34.core')

$(function(){
	H34.core.delete($);
})

H34.core.delete = function($){
	self = {
		ajax: function(url){
			url = url || null
			console.log(url)
			console.log('_token', H34.core.getToken())
			if (url !== null){
				console.log('se va a enviar la petición ajax')
				$.ajax({
					url: url,
					type: 'POST',
					data: {'_token': H34.core.getToken(), '_method': 'delete'}
				})
				.done(self.done)
				.fail(self.fail)
			}
		},
		done: function(response){
			console.log(response)
			msg = '<div data-alert class="alert-box alert">'
			msg += 'Este elemento no pudo ser eliminado.'
			msg += '<a href="#" class="close">&times;</a>'
			msg += '</div>'

			$('#messages').html( msg )
		},
		fail: function(response){
			console.log(response)
			msg = '<div data-alert class="alert-box alert">'
			msg += 'Este elemento no pudo ser eliminado.'
			msg += '<a href="#" class="close">&times;</a>'
			msg += '</div>'

			$('#messages').html( msg )
		},
		getSelector: function(){
			return $('.delete');
		},
		onClick: function(){
			self.ajax( this.getAttribute('data-route') )
		}
	}

	self.getSelector().on('click', self.onClick)
}

