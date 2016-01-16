# -*- coding: UTF-8 -*-

class Pessoa (object):
	def __init__(self, nome, peso, altura):
		self.nome = nome
		self.peso = peso
		self.altura = altura

	def imprime_imc(self):
		imc = self.peso / (self.altura ** 2)
		print 'IMC de %s : %s' % (self.nome, imc)