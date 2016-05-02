module.exports = function(connection){
	this.lista = function(connection,callback){
		connection.query('select * from livros', callback);
	}
	return this;
} 