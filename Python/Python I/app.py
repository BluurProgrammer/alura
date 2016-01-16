# -*- coding: UTF-8 -*-
import re 

def listar(nomes):
	print 'Listando nomes: '
	for nome in nomes:
		print nome

def cadastrar(nomes):
	print 'Digite o nome: '
	nome = raw_input()
	nomes.append(nome)

def remover(nomes):
	print 'Qual nome deseja remover?'
	nome = raw_input()
	nomes.remove(nome)

def alterar(nomes):
	print 'Qual nome deseja alterar?'
	nome = raw_input();
	if (nome in nomes):
		print 'Digite o novo nome'
		novoNome = raw_input()
		posicaoNome = nomes.index(nome)
		nomes[posicaoNome] = novoNome

def procurar(nomes):
	print 'Digite o nome a procurar'
	nome_a_procurar = raw_input()
	if (nome_a_procurar in nomes):
		print "Nome %s esta na lista" % (nome_a_procurar)
	else:
		print "Nome %s não esta na lista" % (nome_a_procurar)

def procurar_regex(nomes):
	print 'Digite a expressão regular'
	regex = raw_input()
	nomes_concatenados = ' '.join(nomes)
	resultados = re.findall(regex, nomes_concatenados)
	print resultados



def menu():
	nomes = []
	escolha = ''
	while(escolha != '0'):
		print 'Digite 1 para cadastrar, 0 para sair, 2 para listar, 3 remover, 4 alterar, 5 busca, 6 regex'
		escolha = raw_input()

		if(escolha == '1'):
			cadastrar(nomes)

		if(escolha == '2'):
			listar(nomes)

		if(escolha == '3'):
			remover(nomes)

		if(escolha == '4'):
			alterar(nomes)

		if(escolha == '5'):
			procurar(nomes)

		if(escolha == '6'):
			procurar_regex(nomes)


menu()